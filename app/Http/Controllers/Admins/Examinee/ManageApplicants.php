<?php

namespace App\Http\Controllers\Admins\Examinee;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Examinee\Users;
use App\Helpers\UserManagement;
use Illuminate\Http\JsonResponse;
use App\Models\Examinee\UsersData;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Livewire\Admin\ExamSchedule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class ManageApplicants extends Controller
{

    public ?string $gender = null;
    public ?string $curr_status = null;
    public ?string $municipality = null;
    public ?string $search_text = null;
    public string|int|null $reg_status = null;
    public string $order_by = 'asc';
    public string|int|null $is_applied = null;
    public array $trainings = [];
    public array $toDeleteTrainings = [];

    public function render(Request $request): View {

        $examinees = UsersData::with('tertiaryEdu', 'trainingSeminars', 'addresses', 'submittedFiles', 'userLogin')
            ->paginate(20);

        $exam_schedule = new ExamSchedule();
        $exam_schedule_records = $exam_schedule->all();

        return view('AdminFunctions/examinees-list', ['data' => $examinees, 'examSchedule' => $exam_schedule_records]);
    }

    /**
     * @param int $examinees_id
     * @return View|RedirectResponse
     * @uses SELECT_examinee
     * @description return a data of specific examinee from database
     */
    public function select_examinee(int $examinees_id): View|RedirectResponse {

        $examinees_data = UsersData::with('addresses', 'tertiaryEdu', 'trainingSeminars', 'submittedFiles', 'regDetails', 'userHistory', 'userLogs')->where('id', $examinees_id)->first();

        // if record is null or not found
        if(!$examinees_data){
            return redirect()->back()->with('error', 'Record cannot found');
        }

        return view('record.show', ['examinees_data' => $examinees_data]);
    }

    /**
     * @param Request $request
     * @return View
     * @uses SEARCH_EXAMINEES
     * @description filter the data based from admin search inputs
     */
    public function search_examinees(Request $request): View
    {
        $this->gender = $request->gender;
        $this->curr_status = $request->curr_status;
        $this->municipality = $request->municipality;
        $this->search_text = $request->search_text;
        $this->reg_status = $request->reg_status;
        $this->order_by = $request->order_by ? $request->order_by : $this->order_by;
        $this->is_applied = $request->is_applied;

        $data = UsersData::query()
            ->when($this->gender, function ($query, $genderValue){
                $query->where('gender', $genderValue);
            })
            ->when($this->reg_status, function ($query, $statusValue){
                $query->whereHas('regDetails', function ($query) use ($statusValue){
                    $query->where('status', $statusValue);
                });
            })
            ->when($this->is_applied, function ($query, $applyValue){
                $query->whereHas('regDetails', function ($query) use ($applyValue){
                    $query->where('apply', $applyValue);
                });
            })
            ->when($this->search_text, function($query, $searchValue){
                $query->where(function ($query) use ($searchValue){
                    $query->where('fname', 'like', '%'.$searchValue.'%')
                        ->orWhere('lname', 'like', '%'.$searchValue.'%')
                        ->orWhere('designation', 'like', '%'.$searchValue.'%');
                })
                ->orWhereHas('tertiaryEdu', function ($query) use ($searchValue){
                    $query->where('degree', 'like', '%'.$searchValue.'%');
                });
            })
            ->when($this->curr_status, function ($query, $currStatusValue){
                $query->where('current_status', $currStatusValue);
            })
            //parent closure, with reference value
            ->when($this->municipality, function ($query, $municipalityValue){
                // nested closure, capture the reference value from parent
                $query->whereHas('addresses', function ($query) use ($municipalityValue){
                    $query->where('municipality', $municipalityValue);
                });
            })
            // related tables
            ->with('tertiaryEdu', 'addresses', 'regDetails')
            ->orderBy('timestamp', $this->order_by)
            ->paginate(20);

        return view('AdminFunctions/result', ['data' => $data]);
    }

    /**
     * @param Request $request
     * @param int|string $user_id
     * @return JsonResponse
     * @uses VALIDATE_APPLICATION
     */
    public function validate_application(Request $request, int|string $user_id): JsonResponse{
         /** validation numbers [
        *   1 => Disapproved,
        *   2 => incomplete,
         *  3 => for evaluation (pending)
         *  4 => Approved
         *  5 => Waiting for result //TODO how to know if applicant done taking the exam
         * ]
        */

        $validation = (int)$request->validation;
        $examSchedule_id = (int)$request->exam_sched_id;

        $applicant = UsersData::with('regDetails', 'userHistory')->find($user_id);

        $reg = $applicant->regDetails;

        if($validation == 3){
            $reg->exam_schedule_id = $examSchedule_id;
            $reg->approved_date = date('Y-m-d', strtotime('now'));
            $reg->exam_status = "Scheduled for Exam";
        }

        $reg->status = $validation;
        if($reg->save()){
            //TODO send email notification to applicant
            return response()->json(['success' => 'Validated Successfully'], 200);
        }

        return response()->json(['error' => 'Server Error'], 500);
    }

    /**
     * TODO: Add the email
     * @param Request $request
     * @param int|string $user_id
     * @return void
     * @description send email to user with the exam result
     * @uses SEND_EXAM_RESULT
     */
    public function send_exam_result(Request $request, int|string $user_id){

        $file = $request->pdf_file;
        $message = $request->message;
        $result = $request->result;

        // if examinee failed the tests
        $part1 = $request->part1;
        $part2 = $request->part2;
        $part3 = $request->part3;

        $user = UsersData::with('userLogin', 'regDetails', 'userHistory.failedHistory')->find($user_id);

        $reg = $user->regDetails;
        $exam_data = ExamSchedule::find($reg->exam_schdule_id);

        $user_email = $exam_data->email;
        // TODO send email
        $email = true;

        if($email){

            //update the user history
            $userHistory = $user->userHistory()->create([
                'user_id'           => $user_id,
                'registration_date' => $reg->reg_date,
                'approved_date'     => $reg->approved_date,
                'schedule'          => $exam_data->datetime,
                'venue'             => $exam_data->venue,
                'assigned_exam_set' => $exam_data->exam_set,
                'status'            => $reg->status,
                'exam_result'       => $result
            ]);

            if($result == 'failed'){
                $userHistory->failedHistory()->create([
                    'part1' => $part1,
                    'part2' => $part2,
                    'part3' => $part3
                ]);
            }

            // reset the reg details data for the user
            $reg->delete();
        }
    }

    /**
     * @param $user_id
     * @return bool
     * @uses DEACTIVATE_ACCOUNT
     * @description deactivate examines or user account it prevent them to login and use their accounts
     */
    public function deactivate_account($user_id):bool{
        $user = UsersData::find($user_id);
        if($user){
            $user_login = Users::find($user->user_login_id);

            $user_login->is_active = 0;
            $user_login->save();
            return true;
        }

        return false;
    }

    public function add_user(Request $request){
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($request->currentStatus) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make($request->all, $rules);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $users_data = [
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
            'no_of_years_in_pos'=> $request->post('yearsPresentPosition'),
            'programming_langs' => $request->post('pl'),
            'e_sign'            => $request->post('signature'),
            'year_level'        => $request->post('yearLevel'),
            'current_status'    => $request->post('currentStatus'),
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now'))
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

        //process trainings
        foreach ($request->post('course') as $key => $training){
            $center = $request->post('center')[$key];
            $hours = $request->post('hours')[$key];

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

    public function update_users_data(Request $request, $user_id){

        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($request->currentStatus) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make($request->all, $rules);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $users_data = [
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
            'no_of_years_in_pos'=> $request->post('yearsPresentPosition'),
            'programming_langs' => $request->post('pl'),
            'e_sign'            => $request->post('signature'),
            'year_level'        => $request->post('yearLevel'),
            'current_status'    => $request->post('currentStatus'),
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now'))
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
        foreach ($request->trainings('course') as $key => $training){
            $center = $request->trainings('center')[$key];
            $hours = $request->trainings('hours')[$key];

            $this->trainings[] = [
                'course' => $training,
                'center' => $center,
                'hours'  => $hours
            ];
        }

        //process trainings
        foreach ($request->post('course') as $key => $training){
            $center = $request->post('center')[$key];
            $hours = $request->post('hours')[$key];

            $this->trainings[] = [
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

        $user_helper->update_users_data($organized_users_data, $user_id);
    }

    public function updateFiles(Request $request, $status, $user_id): void
    {
        // $user_id = session()->get('user')['id'];
        if ($status === "student") {
            if (gettype($request->file('passport')) !== "string") $this->update_passport($user_id, $request->file('passport'));
            if (gettype($request->file('psa')) !== "string") $this->update_psa($user_id, $request->file('psa'));
            if (gettype($request->file('cert')) !== "string") $this->update_COE($user_id, $request->file('cert'));
        } else {
            if (gettype($request->file('validId')) !== "string") $this->update_id($user_id, $request->file('validId'));
            if (gettype($request->file('diploma')) !== "string") $this->update_diploma($user_id, $request->file('diploma'));
        }
        $this->dispatchBrowserEvent('FileUpdateSuccess', true);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_passport($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $file);
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

        return $user_helper->update_psa($user_id, $file);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_diploma($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $file);
    }

    public function update_COE($user_id, $file): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $file);
    }
}

