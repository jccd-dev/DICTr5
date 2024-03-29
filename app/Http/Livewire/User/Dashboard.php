<?php

namespace App\Http\Livewire\User;

use App\Models\Examinee\SubmittedFiles;
use Livewire\Component;
use mysql_xdevapi\Session;
use App\Helpers\FileHandler;
use Livewire\WithFileUploads;
use App\Models\Examinee\Users;
use App\Helpers\UserManagement;
use App\Helpers\UserLogActivity;
use App\Models\Examinee\UsersData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Examinee\RegDetails;
use App\Models\Examinee\UserHistory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;
use App\Models\Admin\ExamSchedule;

class Dashboard extends Component
{
    use WithFileUploads;
    public $cardModal;
    public $cardModal2;
    public string $testing;
    public string $givenName;
    public string $middleName;
    public string $surName;
    public string $tel;
    public string $region;
    public string $province;
    public string $municipality;
    public string $barangay;
    public string $email;
    public string $pob;
    public string $dob;
    public string $gender;
    public string $citizenship;
    public string $civilStatus;
    public string $university;
    public string $degree;
    public int|string $incYears;

    public string $currentStatus;


    public Collection $trainings;

    public int $yearLevel;
    public string $presentOffice;
    public int|string $telNum;
    public string $officeAddress;
    public string $officeCategory;
    public string $designationPosition;
    public string $yearsPresentPosition;

    public array|object $file_uploaded;

    public string $pl;
    public mixed $passport = null;
    public mixed $psa = null;
    public mixed $cert = null;
    public mixed $validId = null;
    public mixed $diploma = null;

    public mixed $signature = null;
    public string $inputsValues = '';
    public int $i = 0;
    public mixed $cur_user_data;

    private $user_id = null;

    public mixed $prev_data;
    public mixed $prev_trainings;
    public mixed $toDeleteTrainings = [];
    public mixed $training_ids = [];

    public mixed $additional_info = []; //FIXME

    protected $rules;

    public $training_limit = 1;
    public $retaker;

    public bool $view_file_modal = false;


    protected $except = ['cardModal', 'cardModal2'];

    public function updated($propertyName)
    {
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        $this->rules = $rules;
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $u = Users::find(session()->get('user')['id']);
        $this->retaker = '';
        $this->givenName = $u->fname;
        $this->middleName = '';
        $this->surName = str_replace(",", "",  $u->lname);
        $this->tel = 0;
        $this->region = '';
        $this->province = '';
        $this->municipality = '';
        $this->barangay = '';
        $this->email = $u->email;
        $this->pob = '';
        $this->dob = '';
        $this->gender = '';
        $this->citizenship = '';
        $this->civilStatus = '';
        $this->university = '';
        $this->degree = '';
        $this->incYears = 0;
        $this->prev_data = collect([]);

        $this->currentStatus = '';

        $this->yearLevel = 0;
        $this->presentOffice = '';
        $this->telNum = 0;
        $this->officeAddress = '';
        $this->officeCategory = '';
        $this->designationPosition = '';
        $this->yearsPresentPosition = '';
        $this->toDeleteTrainings = [];
        $this->training_ids = [];
        $this->rules = [];

        $this->fill([
            'trainings' => collect([[
                'course' => '',
                'center' => '',
                'hours' => ''
            ]]),
        ]);

        $this->pl = '';
        $this->passport = '';
        $this->psa = '';
        $this->cert = '';
        $this->validId = '';
        $this->diploma = '';

        $this->signature = '';

        $userdata = $this->get_user_data();
        foreach ($userdata as $u) {
            $this->file_uploaded = $u->submittedFiles;
        }
    }


    public function render()
    {
        // get userlog_id from session
        $hasData = false;
        if (isset($this->get_user_data()[0]->regDetails)) {
            $hasData = true;
        }
        return view(
            'livewire.user.dashboard',
            [
                'user_data' => $this->get_user_data(),
                "user" => Users::find(session()->get('user')['id']),
                'sched' => $hasData ? ExamSchedule::find($this->get_user_data()[0]->regDetails->exam_schedule_id) : null
            ]
        )->layout('layouts.user-layouts');
    }

    public function popInput()
    {
        if (count($this->trainings) != 1) {
            if (isset($this->training_ids) && count($this->training_ids) > 1) {
                $last_id = $this->training_ids[count($this->training_ids) - 1];
                $this->training_ids->pop();
                $this->toDeleteTrainings[] = $last_id;
            }

            $this->trainings->pop();
        }
    }

    public function addInput()
    {

        $this->training_limit += 1;
        if ($this->training_limit > 3) return;

        $this->trainings->push([
            'course' => '',
            'center' => '',
            'hours' => '',
            't' => $this->training_limit,
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function submit(): void
    {
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($this->currentStatus) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
            $this->rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
            $this->rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make([
            'givenName'           => $this->givenName,
            'middleName'          => $this->middleName,
            'surName'             => $this->surName,
            'tel'                 => $this->tel,
            'region'              => $this->region,
            'province'            => $this->province,
            'municipality'        => $this->municipality,
            'barangay'            => $this->barangay,
            'email'               => $this->email,
            'pob'                 => $this->pob,
            'dob'                 => $this->dob,
            'gender'              => $this->gender,
            'citizenship'         => $this->citizenship,
            'civilStatus'         => $this->civilStatus,
            'pl'                  => $this->pl,
            'signature'           => $this->signature,
            'yearLevel'           => $this->yearLevel,
            'presentOffice'       => $this->presentOffice,
            'telNum'              => $this->telNum,
            'officeAddress'       => $this->officeAddress,
            'officeCategory'      => $this->officeCategory,
            'designationPosition' => $this->designationPosition,
            'yearsPresentPosition' => $this->yearsPresentPosition
        ], $rules);

        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->dispatchBrowserEvent('RegValidationErrors', $err_msgs->getMessages());
            return;
        }
        $users_data = [
            // 'user_login_id'     => session()->get('user')['id'],
            'user_login_id'     => session()->get('user')['id'], // note: for deve, it need to have atleast one data in user login table and use the id here
            'fname'             => $this->givenName,
            'lname'             => $this->surName,
            'mname'             => $this->middleName,
            'email'               => $this->email,
            'place_of_birth'    => $this->pob,
            'date_of_birth'     => date('Y-m-d', strtotime($this->dob)),
            'gender'            => $this->gender,
            'citizenship'       => $this->citizenship,
            'civil_status'      => $this->civilStatus,
            'contact_number'    => $this->tel,
            'present_office'    => $this->presentOffice,
            'designation'       => $this->designationPosition,
            'telephone_number'  => $this->telNum,
            'office_address'    => $this->officeAddress,
            'office_category'   => $this->officeCategory,
            'no_of_years_in_pos' => $this->yearsPresentPosition,
            'programming_langs' => $this->pl,
            'e_sign'            => $this->signature,
            'year_level'        => $this->yearLevel,
            'current_status'    => $this->currentStatus,
            'add_info'          => json_encode($this->additional_info), //FIXME
            'is_retaker'        => $this->retaker ? "yes" : "no",
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now'))
        ];

        $address = [
            'region'            => $this->region,
            'province'          => $this->province,
            'municipality'      => $this->municipality,
            'barangay'          => $this->barangay
        ];

        $tertiary_edu = [
            'school_attended'   => $this->university,
            'degree'            => $this->degree,
            'inclusive_years'   => $this->incYears
        ];

        $files = [
            'passport'  => $this->passport,
            'psa'       => $this->psa,
            'validId'   => $this->validId,
            'diploma'   => $this->diploma,
            'cert'      => $this->cert
        ];

        $organized_users_data = [
            'main_data' => $users_data,
            'address'   => $address,
            'ter_edu'   => $tertiary_edu,
            'training'  => $this->trainings,
            'files'     => $files
        ];


        // dd($organized_users_data, $this->trainings);
        if ($this->insert_users_data($organized_users_data)) {
            UserLogActivity::addToLog('Newly Register', '');
            $this->dispatchBrowserEvent('RegValidationSuccess', true);
        } else {
            $this->dispatchBrowserEvent('RegValidationError', true);
        }
    }

    /**
     * @param array $organized_data
     * @return bool
     * @description use for inserting the validated data from submit function
     */
    public function insert_users_data(array $organized_data): bool
    {
        $user_helper = new UserManagement();
        $file_helper = new FileHandler();

        $res = $user_helper->insert_users_data($organized_data);
        if (is_array($res)) {
            UserLogActivity::addToLog('Newly Register', $res[1]);
            return $res[0]; //true
        }
        return $res;
    }

    public $history_data = null;

    public function get_user_history($history_id)
    {
        $d = $this->get_user_data()[0];
        foreach ($d->userHistory as $item) {
            if ($item->id == $history_id) {
                $this->history_data = $item;
                break;
            }
        }
    }


    /**
     * @return Builder[]|\Illuminate\Database\Eloquent\Collection
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @description use for retrieving current logged in user data
     */
    public function get_user_data(): Collection|array
    {
        $user_login_id = session()->get('user')['id'];

        $user = UsersData::with(
            'tertiaryEdu',
            'trainingSeminars',
            'addresses',
            'submittedFiles',
            'userLogin',
            'userHistory.failedHistory',
            'userHistoryLatest',
            'regDetails'
        )
            ->where('user_login_id', $user_login_id)
            ->get();

        return $user;
        /**
        if(userHistoryLatest)
            if(userHistoryLatest->exam_result == passed)
                you already pass the test
            else
                reapply
        else
            apply
         */
    }

    public function populate_user_data(): void
    {
        $cur_user_data = $this->get_user_data()[0];
        $this->prev_data = $cur_user_data;
        $this->retaker = $cur_user_data->is_retaker;

        // PERSONNAL INFO
        $this->givenName = $cur_user_data->fname;
        $this->middleName = $cur_user_data->mname;
        $this->surName = $cur_user_data->lname;
        $this->tel = $cur_user_data->contact_number;
        //        dd($this->tel);
        $this->email = $cur_user_data->userLogin->email;
        $this->pob = $cur_user_data->place_of_birth;
        $this->dob = $cur_user_data->date_of_birth;
        $this->gender = $cur_user_data->gender;
        $this->citizenship = $cur_user_data->citizenship;
        $this->civilStatus = $cur_user_data->civil_status;

        // DETERMINER (USER STATUS)
        $this->currentStatus = $cur_user_data->current_status;

        $this->pl = $cur_user_data->programming_langs;
        $this->signature = $cur_user_data->e_sign;
        $this->yearLevel = $cur_user_data->year_level;

        // EDUCATION
        $this->university = $cur_user_data->tertiaryEdu->school_attended;
        $this->degree = $cur_user_data->tertiaryEdu->degree;
        $this->incYears = $cur_user_data->tertiaryEdu->inclusive_years;

        // EMPLOYMENT
        $this->presentOffice = $cur_user_data->present_office;
        $this->telNum = $cur_user_data->telephone_number;
        $this->officeAddress = $cur_user_data->office_address;
        $this->officeCategory = $cur_user_data->office_category;
        $this->designationPosition = $cur_user_data->designation;
        $this->yearsPresentPosition = $cur_user_data->no_of_years_in_pos;

        // ADDRESS
        $this->region = $cur_user_data->addresses->region;
        $this->province = $cur_user_data->addresses->province;
        $this->municipality = $cur_user_data->addresses->municipality;
        $this->barangay = $cur_user_data->addresses->barangay;

        $this->additional_info = json_decode($cur_user_data->add_info, true) ?? []; //FIXME

        // SEMINARS
        //        $this->trainings = $cur_user_data->trainingSeminars->toArray();
        $this->trainings->pop();
        $this->trainings = $cur_user_data->trainingSeminars->map(function ($item) {
            return $item->toArray();
        });

        $this->training_ids = $cur_user_data->trainingSeminars->map(function ($item) {
            return $item->id;
        });

        foreach ($cur_user_data->submittedFiles as $s) {
            if (!isset($s)) break;
            if ($s->requirement_type === "diploma_TOR") {
                $this->diploma = $s->file_name;
            } else if ($s->requirement_type === "validId") {
                $this->validId = $s->file_name;
            } else if ($s->requirement_type === "coe") {
                $this->cert = $s->file_name;
            } else if ($s->requirement_type === "psa") {
                $this->psa = $s->file_name;
            } else if ($s->requirement_type === "passport") {
                $this->passport = $s->file_name;
            }
        }
    }
    public function update_users_data($user_id): void
    {
        $user_helper = new UserManagement();

        $rules = $user_helper->rules;
        // update rules  base for current status of the user
        if (strtolower($this->currentStatus) == 'student') {
            $rules = array_merge($rules, $user_helper->student_rule);
        } else {
            $rules = array_merge($rules, $user_helper->prof_rule);
        }

        $validator = Validator::make([
            'givenName'           => $this->givenName,
            'middleName'          => $this->middleName,
            'surName'             => $this->surName,
            'tel'                 => $this->tel,
            'region'              => $this->region,
            'province'            => $this->province,
            'municipality'        => $this->municipality,
            'barangay'            => $this->barangay,
            'email'               => $this->email,
            'pob'                 => $this->pob,
            'dob'                 => $this->dob,
            'gender'              => $this->gender,
            'citizenship'         => $this->citizenship,
            'civilStatus'         => $this->civilStatus,
            'pl'                  => $this->pl,
            'signature'           => $this->signature,
            'yearLevel'           => $this->yearLevel,
            'presentOffice'       => $this->presentOffice,
            'telNum'              => $this->telNum,
            'officeAddress'       => $this->officeAddress,
            'officeCategory'      => $this->officeCategory,
            'designationPosition' => $this->designationPosition,
            'yearsPresentPosition' => $this->yearsPresentPosition

        ], $rules);

        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $err_msgs = $validator->getMessageBag();
            $this->dispatchBrowserEvent('ValidationErrors', $err_msgs->getMessages());
            return;
        }

        $users_data = [
            'fname'             => $this->givenName,
            'lname'             => $this->surName,
            'mname'             => $this->middleName,
            'email'               => $this->email,
            'place_of_birth'    => $this->pob,
            'date_of_birth'     => $this->dob,
            'gender'            => $this->gender,
            'citizenship'       => $this->citizenship,
            'civil_status'      => $this->civilStatus,
            'contact_number'    => $this->tel,
            'present_office'    => $this->presentOffice,
            'designation'       => $this->designationPosition,
            'telephone_number'  => $this->telNum,
            'office_address'    => $this->officeAddress,
            'office_category'   => $this->officeCategory,
            'no_of_years_in_pos' => $this->yearsPresentPosition,
            'programming_langs' => $this->pl,
            'e_sign'            => $this->signature,
            'yearLevel'         => $this->yearLevel,
            'current_status'    => $this->currentStatus,
            'add_info'          => json_encode($this->additional_info), //FIXME
            'is_retaker'        => $this->retaker ? "yes" : "no",
            'date_accomplish'   => date('Y-m-d H:i:s', strtotime('now'))
        ];

        $address = [
            'region'            => $this->region,
            'province'          => $this->province,
            'municipality'      => $this->municipality,
            'barangay'          => $this->barangay
        ];

        $tertiary_edu = [
            'school_attended'   => $this->university,
            'degree'            => $this->degree,
            'year_level'        => $this->yearLevel,
            'inclusive_years'   => $this->incYears
        ];

        $organized_users_data = [
            'main_data'        => $users_data,
            'address'          => $address,
            'ter_edu'          => $tertiary_edu,
            'training'         => $this->trainings,
            'to_del_trainings' => $this->toDeleteTrainings
        ];

        $user_helper->update_users_data($organized_users_data, $user_id);

        $this->dispatchBrowserEvent('RegUpdateValidationSuccess', true);

        UserLogActivity::addToLog('Update registered Data', $user_id);
    }

    public function updateFiles($status, $user_id): void
    {
        // $user_id = session()->get('user')['id'];
        if ($status === "student") {
            if (gettype($this->passport) !== "string") $this->update_passport($user_id);
            if (gettype($this->psa) !== "string") $this->update_psa($user_id);
            if (gettype($this->cert) !== "string") $this->update_COE($user_id);
        } else {
            if (gettype($this->validId) !== "string") $this->update_id($user_id);
            if (gettype($this->diploma) !== "string") $this->update_diploma($user_id);
        }
        $this->dispatchBrowserEvent('FileUpdateSuccess', true);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_passport($user_id): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $this->passport);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_psa($user_id): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $this->psa);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_id($user_id): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $this->validId);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_diploma($user_id): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $this->diploma);
    }

    public function update_COE($user_id): bool
    {
        $user_helper = new UserManagement();

        return $user_helper->update_psa($user_id, $this->cert);
    }

    /**
     * @param int|string $user_id
     * @return bool
     * @description apply to the exam after registering to the system
     */
    public function apply(int|string $user_id): bool
    {

        $user = UsersData::with('regDetails')->find($user_id);
        $reg = $user->regDetails;

        // dd($user);
        if ($user) {
            if ($reg == null) {
                $reg = new RegDetails();
                $reg->user_id = $user_id;
                $reg->reg_date = date('Y-m-d', strtotime('now'));
                $reg->apply = 1;

                if ($reg->save()) {

                    // count user as applicant if he/she is not a retaker.
                    DB::table('visitor_count')->increment('applicants');

                    session()->flash('success', 'Application has been sent. Your application will be evaluated. Please wait for confirmation from time-to-time.');
                    UserLogActivity::addToLog('Apply for exam', $user_id);
                    return true;
                }

                session()->flash('error', 'server error');
                return false;
            } else {
                if ($reg->apply = 1) {
                    session()->flash('warning', 'You have already applied');
                    return false;
                }
                $reg->apply = 1;

                if ($reg->save()) {
                    session()->flash('success', 'Application has been sent. Your application will be evaluated. Please wait for confirmation from time-to-time.');
                    UserLogActivity::addToLog('ReApply for exam', $user_id);
                    return true;
                }

                session()->flash('error', 'server error');
                return false;
            }
        }

        // it means that the user already applied
        session()->flash('warning', 'You have to register first');
        return false;
    }

    /**
     * @return
     * @description Generation of ILCDB Form 2
     */
    public function generate_pdf()
    {
        $users_data = $this->get_user_data();
        $data = [];
        foreach ($users_data as $user_data) {
            $data = [
                'id' => $user_data->id,
                'is_retaker' => $user_data->is_retaker,
                'email' => $user_data->userLogin->email,
                'fname' => $user_data->fname,
                'lname' => $user_data->lname,
                'mname' => $user_data->mname,
                'place_of_birth' => $user_data->place_of_birth,
                'date_of_birth' => date('F d, Y', strtotime($user_data->date_of_birth)),
                'gender' => $user_data->gender,
                'citizenship' => $user_data->citizenship,
                'civil_status' => $user_data->civil_status,
                'contact_number' => $user_data->contact_number,
                'present_office' => $user_data->present_office,
                'designation' => $user_data->designation,
                'telephone_number' => $user_data->telephone_number,
                'office_address' => $user_data->office_address,
                'office_category' => $user_data->office_category,
                'no_of_years_in_pos' => $user_data->no_of_years_in_pos,
                'programming_langs' => $user_data->programming_langs,
                'e_sign' => $user_data->e_sign,
                'year_level' => $user_data->year_level,
                'current_status' => $user_data->current_status,
                'date_accomplished' => $user_data->date_accomplished,
                'region' => $user_data->addresses->region,
                'province' => $user_data->addresses->province,
                'municipality' => $user_data->addresses->municipality,
                'add_info' => $user_data->add_info,
                'barangay' => $user_data->addresses->barangay,
                'school_attended' => $user_data->tertiaryEdu->school_attended,
                'degree' => $user_data->tertiaryEdu->degree,
                'inclusive_years' => $user_data->tertiaryEdu->inclusive_years,
                'passport' => null,
                'file_type' => null,
                'training_seminar' => null,
                'date_accomplish' => $user_data->date_accomplish,
            ];

            foreach ($user_data->submittedFiles as $file) {
                if ($file->requirement_type == 'passport') {
                    $data['passport'] = $file->file_name;
                    $data['file_type'] = $file->file_type;
                }
            }

            foreach ($user_data->trainingSeminars as $ts) {
                $data['training_seminar'][] = [
                    'course' => $ts->course,
                    'center' => $ts->center,
                    'hours' => $ts->hours,
                ];
            }
        }
        $user_login_id = session()->get('user')['id'];
        $user_history = UserHistory::where('user_id', $user_login_id)->count();
        return redirect()->route('user.generate_pdf', ['data' => $data]);
    }

    public function view_file_submitted($id)
    {
        $submitted_file = SubmittedFiles::where('id', $id)->first();
        $file_name = $submitted_file->file_name;
        $this->dispatchBrowserEvent('show_file', $file_name);
        $this->view_file_modal = true;
    }
}
