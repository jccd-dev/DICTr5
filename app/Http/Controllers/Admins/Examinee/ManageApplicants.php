<?php

namespace App\Http\Controllers\Admins\Examinee;

use App\Http\Controllers\Controller;
use App\Http\Livewire\Admin\ExamSchedule;
use App\Models\Examinee\Users;
use App\Models\Examinee\UsersData;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ManageApplicants extends Controller
{

    public ?string $gender = null;
    public ?string $curr_status = null;
    public ?string $municipality = null;
    public ?string $search_text = null;
    public string|int|null $reg_status = null;
    public string $order_by = 'asc';
    public string|int|null $is_applied = null;


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
     * @uses SELECT_EXAMINER
     * @description return a data of specific examiner from database
     */
    public function select_examiner(int $examinees_id): View|RedirectResponse {

        $examinees_data = UsersData::with('addresses', 'tertiaryEdu', 'trainingSeminars', 'submittedFiles', 'regDetails', 'userHistory')->where('id', $examinees_id)->first();

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
         *  5 => Waiting for result
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

        // if examiner failed the tests
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
}

