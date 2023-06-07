<?php

namespace App\Http\Controllers\Admins\Examinee;

use App\Mail\EmailUsers;
use Illuminate\View\View;
use App\Mail\ScheduleOfExam;
use App\Mail\SendTranscript;
use Illuminate\Http\Request;
use App\Models\Examinee\Users;
use App\Helpers\UserManagement;
use App\Helpers\UserLogActivity;
use App\Mail\RegistrationStatus;
use App\Helpers\AdminLogActivity;
use Illuminate\Http\JsonResponse;
use App\Models\Examinee\UsersData;
use Illuminate\Support\Facades\DB;
use App\Models\Examinee\RegDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use App\Helpers\SearchExamineesHelper;
use Illuminate\Support\Facades\Storage;
use App\Http\Livewire\Admin\ExamSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use App\Models\Admin\ExamSchedule as ExamScheduleModel;

class ManageApplicants extends Controller
{

    private string $cache_key = 'search_items';
    public ?string $retake = null;
    public ?string $curr_status = null;
    public ?string $municipality = null;
    public ?string $search_text = null;
    public string|int|null $reg_status = null;
    public string $order_by = 'asc';
    public string|int|null $is_applied = null;
    public string|int|null $applicant = null;

    public array $trainings = [];
    public array $toDeleteTrainings = [];

    public $file = null;
    public function render(Request $request): View
    {

        $searchValues = Cache::get($this->cache_key);

        if ($searchValues) {
            $examinees = SearchExamineesHelper::search_with_cache($searchValues);
        } else {
            $examinees = UsersData::with('tertiaryEdu', 'trainingSeminars', 'addresses', 'submittedFiles', 'userLogin', 'userHistoryLatest')->paginate(20);

            $searchValues = [
                'retake' => $this->retake,
                'curr_status' => $this->curr_status,
                'municipality' => $this->municipality,
                'search_text' => $this->search_text,
                'reg_status' => $this->reg_status,
                'order_by' => $this->order_by,
                'is_applied' => $this->is_applied,
                'applicant' => $this->applicant,
            ];
        }

        $exam_schedule = new ExamSchedule();
        $exam_schedule_records = $exam_schedule->all();

        return view('AdminFunctions.examinees-list', ['data' => $examinees, 'examSchedule' => $exam_schedule_records, 'searchValues' => $searchValues]);
    }

    /**
     * @param int $examinees_id
     * @return View|RedirectResponse
     * @uses SELECT_examinee
     * @description return a data of specific examinee from database
     */
    public function select_examinee(int $examinees_id): View|RedirectResponse
    {
        $examinees_data = UsersData::with('addresses', 'tertiaryEdu', 'trainingSeminars', 'submittedFiles', 'regDetails', 'userHistory.failedHistory', 'userLogs', 'userLogin', 'userHistoryLatest')->where('id', $examinees_id)->first();
        $exam_schedule = new ExamScheduleModel();
        // if record is null or not found
        if (!$examinees_data) {
            return redirect()->back()->with('error', 'Record cannot found');
        }
        // dd($examinees_data);
        return view('AdminFunctions.applicant-data', ['examinees_data' => $examinees_data, 'examSched' => $exam_schedule::all()]);
    }

    // public function examinee(int $examinees_id)
    // {
    //     $examinees_data = UsersData::with('addresses', 'tertiaryEdu', 'trainingSeminars', 'submittedFiles', 'regDetails', 'userHistory', 'userLogs', 'userLogin')->where('id', $examinees_id)->first();
    //     // dd($examinees_data);
    //     // if record is null or not found
    //     if (!$examinees_data) {
    //         return redirect()->back()->with('error', 'Record cannot found');
    //     }

    //     return $examinees_data->toArray();
    // }

    /**
     * @param Request $request
     * @return View
     * @uses SEARCH_EXAMINEES
     * @description filter the data based from admin search inputs
     */
    public function search_examinees(Request $request): View
    {
        $this->retake = $request->retake;
        $this->curr_status = $request->curr_status;
        $this->municipality = $request->municipality;
        $this->search_text = $request->search_text;
        $this->reg_status = $request->reg_status;
        $this->order_by = $request->order_by ? $request->order_by : $this->order_by;
        $this->is_applied = $request->is_applied;
        $this->applicant = $request->applicant;

        // put the search_items in the cache
        $search_values = [
            'retake' => $request->retake,
            'curr_status' => $request->curr_status,
            'municipality' => $request->municipality,
            'search_text' => $request->search_text,
            'reg_status' => $request->reg_status,
            'order_by' => $request->order_by ? $request->order_by : $this->order_by,
            'is_applied' => $request->is_applied,
            'applicant' => $request->applicant,
        ];

        Cache::put($this->cache_key, $search_values, 600);

        $data = SearchExamineesHelper::search_with_cache($search_values);

        return view('AdminFunctions/result', ['data' => $data]);
    }

    /**
     * @param Request $request
     * @param int|string $user_id
     * @return JsonResponse
     * @uses VALIDATE_APPLICATION
     */
    public function validate_application(Request $request, int|string $user_id): JsonResponse
    {
        /** validation numbers [
         *   1 => Disapproved,
         *   2 => incomplete,
         *  3 => for evaluation (pending)/auto
         *  4 => Approved
         *  5 => Scheduled for exam
         *  6 => Waiting for result
         *  7 => Done Exam
         * ]
         */
        $validation = (int)$request->post('validation');
        $examSchedule_id = (int)$request->post('exam-sched');
        $remark = $request->post('remarks');

        $applicant = UsersData::with('regDetails', 'userHistory', 'userLogin')->find($user_id);

        $reg = $applicant->regDetails;

        // $reg->exam_schedule_id = $examSchedule_id;
        $reg->approved_date = date('Y-m-d', strtotime('now'));

        $user_email = $applicant->user_login_id == null ? $applicant->email : $applicant->userLogin->email;
        $email_type = 0;
        switch ($validation) {
            case 1:
                $email_type = 1;
                $reg->status = 1;
                break;
            case 2:
                $email_type = 2;
                $reg->status = 2;
                break;
            case 4:
                $email_type = 4;
                $reg->approved_date = date('Y-m-d', strtotime('now'));
                $reg->status = 4; // approved only
                break;
            case 5:
                if ($reg->status != 4) {
                    return response()->json(['error' => 'Applicant is not approve yet'], 400);
                }
                $email_type = 6;
                $reg->exam_schedule_id = $examSchedule_id;
                $reg->status = 6;
                break;
            case 6:
                if ($reg->status != 5) {
                    return response()->json(['error' => 'Applicant Has no Exam Schedule yet'], 400);
                }
                $reg->status = 5;
                break;
            default:
                return response()->json(['error' => 'Invalid validation'], 400);
                break;
        }

        $reg->status = $validation;
        if ($reg->save()) {

            $exam_data = ExamScheduleModel::find($examSchedule_id);

            if ($email_type == 6) {
                $data = [
                    'first_name'        => $applicant->fname,
                    'exam_start_date'   => $exam_data->start_date,
                    'exam_end_date'     => $exam_data->end_date,
                    'name'              => $applicant->formatted_name,
                    'email'             => $user_email,
                    'intended_for'      => 'Sent Exam Schedule'
                ];
                try {
                    Mail::to($data['email'])->send(new ScheduleOfExam($data));
                } catch(\Throwable $th){
                    return response()->json(['error' => 'Email Not Sent'], 404);
                }
            } else {
                $data = [
                    'name'          => $applicant->formatted_name,
                    'ramark'        => $remark,
                    'email'         => $user_email,
                    'intended_for'  => 'Sent Registration Status'
                ];
                try{
                    Mail::to($data['email'])->send(new RegistrationStatus($email_type, $data));
                } catch(\Throwable $th){
                    return response()->json(['error' => 'Email Not Sent'], 404);
                }
            }

            return response()->json(['success' => 'Validated Successfully'], 200);
        }

        return response()->json(['error' => 'Server Error'], 500);
    }

    /**
     * @param Request $request
     * @param int|string $user_id
     * @return JsonResponse
     * @description send email to user with the exam result
     * @uses SEND_EXAM_RESULT
     */
    public function send_exam_result(Request $request, int|string $user_id): JsonResponse
    {
        $result = $request->post('exam_result');

        $user = UsersData::with('userLogin', 'regDetails', 'userHistory.failedHistory')->find($user_id);

        $reg = $user->regDetails;

        $exam_data = ExamScheduleModel::find($reg->exam_schedule_id);

        $user_email = $user->user_login_id == null ? $user->email : $user->userLogin->email;

        $start_time = date('g:i a', strtotime($exam_data->start_date));
        $end_time = date('g:i a', strtotime($exam_data->end_date));
        $day = date('F d, Y', strtotime($exam_data->start_date));

        $sched = "{$day} from {$start_time} - {$end_time}";

        $userHistory = $user->userHistory()->create([
            'user_id'           => $user_id,
            'registration_date' => $reg->reg_date,
            'approved_date'     => $reg->approved_date,
            'schedule'          => $sched,
            'venue'             => $exam_data->venue,
            'exam_set'          => $exam_data->exam_set,
            'status'            => 7,
            'exam_result'       => $result
        ]);

        if ($result == 'passed') {
            DB::table('visitor_count')->increment('passers');
            // reset the reg details data for the user
            $reg->delete();

            $data = [
                'name'          => $user->formatted_name,
                'venue'         => $exam_data->venue,
                'exam_sched'    => $sched,
                'email'         => $user_email,
                'intended_for'  => 'Sent passed result'
            ];

            try{
                Mail::to($user_email)->send(new EmailUsers(true, $data));
            }
            catch(\Throwable $th){
                return response()->json(['error' => 'Email Not Sent'], 404);
            }

            AdminLogActivity::addToLog("send exam passed result to {$user->id}", session()->get('admin_id'));
            return response()->json(['success' => 'Examinee Passed'], 200);
        }

        // if examinee failed the tests
        $part1 = $request->post('part1');
        $part2 = $request->post('part2');
        $part3 = $request->post('part3');

        $userHistory->failedHistory()->create([
            'part_1' => $part1,
            'part_2' => $part2,
            'part_3' => $part3
        ]);

        // reset the reg details data for the user
        // done status if its  exam_status is failed cause passed the reg details will be deleted
        $reg->exam_schedule_id = null;
        $reg->reg_date = null;
        $reg->approved_date = null;
        $reg->status = 7;
        $reg->apply = 2;

        if (!$reg->save()) {

            return response()->json(['error' => 'server Error'], 500);
        }

        $data = [
            'name'          => $user->formatted_name,
            'venue'         => $exam_data->venue,
            'exam_sched'    => $sched,
            'email'         => $user_email,
            'intended_for'  => 'Sent Registration Status',
            'part1'        => $part1,
            'part2'        => $part2,
            'part3'        => $part3
        ];

        try {
            Mail::to($user_email)->send(new EmailUsers(false, $data));
        } catch(\Throwable $th){
            return response()->json(['error' => 'Email Not Sent'], 404);
        }

        AdminLogActivity::addToLog("send exam failed result to {$user->id}", session()->get('admin_id'));
        return response()->json(['success' => ''], 200);
    }

    /**
     * @param Request $request
     * @param $user_id
     * @uses SENDTRANSCRIPT
     */
    public function sendTranscript(Request $request, $user_id)
    {
        $this->file = $request->file('pdf_file');

        $file_extension = $this->file->getClientOriginalExtension();

        $user = UsersData::with('userLogin', 'regDetails')->find($user_id);

        $reg = $user->regDetails;
        // dd($reg);
        $exam_data = ExamScheduleModel::find($reg->exam_schedule_id);

        $file_name = "{$user->fname}_transcript.{$file_extension}";

        $this->file->storeAs('/public/fileSubmits', $file_name);

        $storagePath = storage_path('app/public/fileSubmits/' . $file_name);

        // Send email with attachment
        $data = [
            'name' => $user->formatted_name,
            'exam_schedule' => $exam_data->start_date,
            'email' => $user->userLogin == null ? $user->email : $user->userLogin->email,
            'intended_for' => 'Sent transcript Status',
            'file_location' => $storagePath
        ];

        try{
            Mail::to($data['email'])->send(new SendTranscript($data));
        } catch(\Throwable $th){
            return response()->json(['error' => $th], 404);
        }

        // Delete the stored file
        Storage::delete('public/fileSubmits/' . $file_name);

        AdminLogActivity::addToLog("send transcript to user {$user->id}", session()->get('admin_id'));

        return response()->json(['success' => ''], 200);

    }

    /**
     * @param $user_id
     * @return bool
     * @uses DEACTIVATE_ACCOUNT
     * @description deactivate examines or user account it prevent them to login and use their accounts
     */
    public function deactivate_account($user_id): bool
    {
        $user = UsersData::find($user_id);
        if ($user) {
            $user_login = Users::find($user->user_login_id);

            $user_login->is_active = 0;
            $user_login->save();
            return true;
        }

        return false;
    }

    /**
     * @param Request $request
     * @return array|bool|JsonResponse|mixed
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @uses ADD_USER
     * @description Manage to add manually users data in admin side.
     */
    public function add_user(Request $request): mixed
    {
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($request->post('current-status')) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $users_data = [
            'is_retaker'        => $request->post('retaker') ? 'yes' : 'no',
            'fname'             => $request->post('givenName'),
            'lname'             => $request->post('surName'),
            'email'             => $request->post('email'),
            'mname'             => $request->post('middleName'),
            'place_of_birth'    => $request->post('pob'),
            'date_of_birth'     => date('Y-m-d', strtotime($request->post('dob'))),
            'gender'            => $request->post('gender'),
            'citizenship'       => $request->post('citizenship'),
            'civil_status'      => $request->post('civilStatus'),
            'contact_number'    => $request->post('tel'),
            'present_office'    => $request->post('presentOffice'),
            'designation'       => $request->post('designationPosition'),
            'telephone_number'  => $request->post('telNum'),
            'office_address'    => $request->post('officeAddress'),
            'office_category'   => $request->post('officeCategory'),
            'no_of_years_in_pos' => $request->post('yearsPresentPosition'),
            'programming_langs' => $request->post('pl'),
            'e_sign'            => $request->post('signature'),
            'year_level'        => $request->post('yearLevel'),
            'current_status'    => $request->post('current-status'),
            'add_info'          => json_encode($request->post('addInfo')),
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now')),
        ];

        $address = [
            'region'            => $request->post('region'),
            'province'          => $request->post('province'),
            'municipality'      => $request->post('municipality'),
            'barangay'          => $request->post('barangay')
        ];

        $tertiary_edu = [
            'school_attended'   => $request->post('university'),
            'degree'            => $request->post('degree'),
            'inclusive_years'   => $request->post('incYears')
        ];

        $files = [
            'passport'  => $request->file('passport'),
            'psa'       => $request->file('psa'),
            'validId'   => $request->file('validId'),
            'diploma'   => $request->file('diploma'),
            'cert'      => $request->file('cert')
        ];
        // dd($request->post(''));
        //process trainings
        foreach ($request->post('seminars-course') as $key => $training) {
            $center = $request->post('seminars-center')[$key];
            $hours = $request->post('seminars-hours')[$key];

            $this->trainings[] = [
                'course' => $training,
                'center' => $center,
                'hours'  => $hours
            ];
        }

        $organized_users_data = [
            'main_data' => $users_data,
            'address'   => $address,
            'ter_edu'   => $tertiary_edu,
            'training'  => $this->trainings,
            'files'     => $files
        ];

        return $user_helper->insert_users_data($organized_users_data);
    }

    /**
     * @param Request $request
     * @param $user_id
     * @return JsonResponse|void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @uses UPDATE_USERS_DATA
     * @description Update the existing user's data in admin side
     *              admin can update all user's data if needed
     */
    public function update_users_data(Request $request, $user_id)
    {
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($request->post('current-status')) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $users_data = [
            'is_retake'         => $request->post('retake') ? 'yes' : 'no',
            'fname'             => $request->post('givenName'),
            'lname'             => $request->post('surName'),
            'mname'             => $request->post('middleName'),
            'place_of_birth'    => $request->post('pob'),
            'date_of_birth'     => date('Y-m-d', strtotime($request->post('dob'))),
            'gender'            => $request->post('gender'),
            'citizenship'       => $request->post('citizenship'),
            'civil_status'      => $request->post('civilStatus'),
            'contact_number'    => $request->post('tel'),
            'present_office'    => $request->post('presentOffice'),
            'designation'       => $request->post('designationPosition'),
            'telephone_number'  => $request->post('telNum'),
            'office_address'    => $request->post('officeAddress'),
            'office_category'   => $request->post('officeCategory'),
            'no_of_years_in_pos' => $request->post('yearsPresentPosition'),
            'programming_langs' => $request->post('pl'),
            'e_sign'            => $request->post('signature'),
            'year_level'        => $request->post('yearLevel'),
            'current_status'    => $request->post('current-status'),
            'add_info'          => json_encode($request->post('addInfo')),
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now')),
        ];

        $address = [
            'region'            => $request->post('region'),
            'province'          => $request->post('province'),
            'municipality'      => $request->post('municipality'),
            'barangay'          => $request->post('barangay')
        ];

        $tertiary_edu = [
            'school_attended'   => $request->post('university'),
            'degree'            => $request->post('degree'),
            'inclusive_years'   => $request->post('incYears')
        ];
        //process trainings
        foreach ($request->input('course') as $key => $training) {
            $center = $request->input('center')[$key];
            $hours = $request->input('hours')[$key];
            $id = $request->input('trainingId')[$key];

            $this->trainings[] = [
                'id'     => $id,
                'course' => $training,
                'center' => $center,
                'hours'  => $hours
            ];
        }

        $organized_users_data = [
            'main_data'        => $users_data,
            'address'          => $address,
            'ter_edu'          => $tertiary_edu,
            'training'         => $this->trainings,
            'to_del_trainings' => $request->post('toDeleteTrainings')
        ];

        $this->updateFiles($request, strtolower($request->post('current-status')), $user_id);
        AdminLogActivity::addToLog("update user {$user_id}", session()->get('admin_id'));
        $user_helper->update_users_data($organized_users_data, $user_id);

        return 1;
    }

    public function updateFiles(Request $request, $status, $user_id): void
    {
        // $user_id = session()->get('user')['id'];
        if ($status === "student") {
            if (gettype($request->file('passport')) !== "string" && !is_null($request->file('passport'))) $this->update_passport($user_id, $request->file('passport'));
            if (gettype($request->file('psa')) !== "string" && !is_null($request->file('psa'))) $this->update_psa($user_id, $request->file('psa'));
            if (gettype($request->file('cert')) !== "string" && !is_null($request->file('cert'))) $this->update_COE($user_id, $request->file('cert'));
        } else {
            if (gettype($request->file('validId')) !== "string" && !is_null($request->file('validId'))) $this->update_id($user_id, $request->file('validId'));
            if (gettype($request->file('diploma')) !== "string" && !is_null($request->file('diploma'))) $this->update_diploma($user_id, $request->file('diploma'));
        }
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_passport($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_passport($user_id, $file);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_psa($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $file);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_id($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_id($user_id, $file);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_diploma($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_diploma($user_id, $file);
    }

    public function update_COE($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $file);
    }

    /**
     * @param int|string $user_id
     * @return bool
     * @uses APPLY_EXAMINEES
     * @description unlike in user's/examinees side this function is auto called by other function
     *              to automatically after it register by admin.
     */
    public function apply_examinee(int|string $user_id): bool
    {
        $user = UsersData::with('regDetails', 'userHistory')->find($user_id);
        $reg = $user->regDetails;
        // dd($user);
        if ($user) {

            if ($reg === null) {
                $reg = new RegDetails();
                $reg->user_id = $user_id;
                $reg->reg_date = date('Y-m-d', strtotime('now'));
                $reg->apply = 1;

                if ($reg->save()) {

                    // count user as applicant if he/she is not a retaker.
                    DB::table('visitor_count')->increment('applicants');

                    session()->flash('success', 'Application sent');
                    UserLogActivity::addToLog('Apply for exam', $user_id);
                    return true;
                }

                session()->flash('error', 'server error');
                return false;
            } elseif ($reg) {
                if ($reg->apply = 1) {
                    session()->flash('warning', 'You have already applied');
                    return false;
                }
                $reg->status = 3;
                $reg->apply = 1;

                if ($reg->save()) {

                    session()->flash('success', 'Application sent');
                    UserLogActivity::addToLog('ReApply for exam', $user_id);
                    return true;
                }

                session()->flash('error', 'server error');
                return false;
            } else {
                session()->flash('warning', 'You have already applied');
                return false;
            }
        }
    }
}
