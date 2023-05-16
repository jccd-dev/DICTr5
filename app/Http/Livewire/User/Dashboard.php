<?php

namespace App\Http\Livewire\User;

use App\Helpers\FileHandler;
use App\Models\Examinee\UsersData;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use mysql_xdevapi\Session;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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

    protected $rules = [
        'givenName'     => "required|regex:/^[A-Za-z\s]+$/",
        'middleName'    => "required|regex:/^[A-Za-z\s]+$/",
        'surName'       => "required|regex:/^[A-Za-z\s]+$/",
        'tel'           => "required|regex:/^09\d{9}$/",
        'region'        => "required",
        'province'      => "required",
        'municipality'  => "required",
        'barangay'      => "required",
        'email'         => "required|email",
        'pob'           => "required",
        'dob'           => "required",
        'gender'        => "required",
        'citizenship'   => "required",
        'civilStatus'   => "required",
        'pl'            => "required",
        'signature'     => "required",
        'passport'      => "mimes:jpg,jpeg,png|max:5120|dimensions:min_width=826,min_height=1062|max:5120",
        'psa'           => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'validId'       => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'diploma'       => "mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'trainings.*.center' => 'required|string',
        'trainings.*.course' => 'required|string',
        'trainings.*.hours' => 'required|numeric',
    ];

    private array $student_rule = [
        'yearLevel' => "required|numeric"
    ];

    private array $prof_rule = [
        'presentOffice'       => "required",
        'telNum'              => "required",
        'officeAddress'       => "required",
        'officeCategory'      => "required",
        'designationPosition' => "required",
        'yearsPresentPosition' => "required|numeric"
    ];

    protected $except = ['cardModal', 'cardModal2'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->givenName = '';
        $this->middleName = '';
        $this->surName = '';
        $this->tel = 0;
        $this->region = '';
        $this->province = '';
        $this->municipality = '';
        $this->barangay = '';
        $this->email = '';
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
    }
    public function render()
    {
        // get userlog_id from session
        return view('livewire.user.dashboard', ['user_data' => $this->get_user_data()])->layout('layouts.user-layouts');
    }

    public function popInput()
    {
        if (count($this->trainings) != 1) {
            if (isset($this->training_ids)) {
                $last_id = $this->training_ids[count($this->training_ids) - 1];
                $this->training_ids->pop();
                $this->toDeleteTrainings[] = $last_id;
            }

            $this->trainings->pop();
        }
    }

    public function addInput()
    {
        $this->trainings->push([
            'course' => '',
            'center' => '',
            'hours' => '',
        ]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function submit(): void
    {

        // update rules  base for current status of the user
        if (strtolower($this->currentStatus) == 'student') {
            $this->rules = array_merge($this->rules, $this->student_rule);
        } else {
            $this->rules = array_merge($this->rules, $this->prof_rule);
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

        ], $this->rules);

        if ($validator->fails()) {
            $err_msgs = $validator->getMessageBag();
            foreach ($err_msgs->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $this->dispatchBrowserEvent('RegistrationValidationErrors', $err_msgs->getMessages());
            return;
        }
        $users_data = [
            // 'user_login_id'     => session()->get('user')['id'],
            'user_login_id'     => 2, // note: for deve, it need to have atleast one data in user login table and use the id here
            'fname'             => $this->givenName,
            'lname'             => $this->surName,
            'mname'             => $this->middleName,
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
            'year_level'         => $this->yearLevel,
            'current_status'    => $this->currentStatus,
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

        $organized_users_data = [
            'main_data' => $users_data,
            'address'   => $address,
            'ter_edu'   => $tertiary_edu
        ];

        // dd($organized_users_data, $this->trainings);
        if ($this->insert_users_data($organized_users_data)) {
            $this->dispatchBrowserEvent('RegistrationValidationSuccess', true);
        } else {
            $this->dispatchBrowserEvent('RegistrationValidationError', true);
        }
    }

    /**
     * @param array $organized_data
     * @return bool
     * @description use for inserting the validated data from submit function
     */
    public function insert_users_data(array $organized_data): bool
    {
        $user = new UsersData();
        $file_helper = new FileHandler();

        $user->fill($organized_data['main_data']);

        // insert into main table users data
        if ($user->save()) {
            $user_id = $user->id;
            $last_name = $user->lname;

            // insert into tertiary education table
            $user->tertiaryEdu()->create($organized_data['ter_edu']);

            // insert into training seminars table
            $user->trainingSeminars()->createMany($this->trainings);

            // insert into address table
            $user->addresses()->create($organized_data['address']);

            $submit = $user->submittedFiles();
            // insert files into folder and database
            $this->passport != null ? $file_helper->store_files($this->passport, $submit, 'passport', $last_name) : null;
            $this->psa != null ? $file_helper->store_files($this->psa, $submit, 'psa', $last_name) : null;
            $this->validId != null ? $file_helper->store_files($this->validId, $submit, 'validId', $last_name) : null;
            $this->diploma != null ? $file_helper->store_files($this->diploma, $submit, 'diploma_TOR', $last_name) : null;
            $this->cert != null ? $file_helper->store_files($this->cert, $submit, 'coe', $last_name) : null;

            return true;
        }

        return false;
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
        return UsersData::with('tertiaryEdu', 'trainingSeminars', 'addresses', 'submittedFiles', 'userLogin', 'userHistory')
            ->where('user_login_id', $user_login_id)
            ->get();

        // use this to identify if user needs to reapply
        // $user->userHistory()->exists();
    }

    public function populate_user_data(): void
    {
        $cur_user_data = $this->get_user_data()[0];
        $this->prev_data = $cur_user_data;

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
            }
        }
    }
    public function update_users_data($user_id): void
    {
        // update rules  base for current status of the user
        if (strtolower($this->currentStatus) == 'student') {
            $this->rules = array_merge($this->rules, $this->student_rule);
        } else {
            $this->rules = array_merge($this->rules, $this->prof_rule);
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

        ], $this->rules);

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

        $user = UsersData::find($user_id);

        $user->update($users_data);

        $user->tertiaryEdu->update($tertiary_edu);
        $user->addresses->update($address);

        foreach ($this->trainings as $training) {
            $training_id = $training['id'] ?? null;
            $training['user_id'] = $user->id; // Set the user_id
            // if $this->>trainings has no id then i will create bew record, else update
            $user->trainingSeminars()->updateOrCreate(['id' => $training_id], $training);
        }

        // in case the user remove the training data
        if (!is_null($this->toDeleteTrainings)) {
            foreach ($this->toDeleteTrainings as $training_id) {
                $training = $user->trainingSeminars()->where('id', $training_id)->first();
                $training ? $training->delete() : null;
            }
        }

        $this->dispatchBrowserEvent('RegUpdateValidationSuccess', true);
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
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($this->passport, $user, 'passport');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_psa($user_id): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($this->psa, $user, 'psa');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_id($user_id): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($this->validId, $user, 'validId');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function update_diploma($user_id): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($this->diploma, $user, 'diploma_TOR');
    }

    public function update_COE($user_id): bool
    {
        $file_helper = new FileHandler();
        $user = UsersData::find($user_id);

        return $file_helper->update_the_file($this->cert, $user, 'coe');
    }

    /**
     * @param int|string $user_id
     * @return bool
     * @description apply to the exam after registering to the system
     */
    public function apply(int|string $user_id): bool{

        $user = UsersData::with('regDetails')->find($user_id);
        $reg = $user->regDetails;

        if($user){

            if(!$reg->exists())
            {
                $reg->user_id = $user_id;
                $reg->reg_date = date('Y-m-d', strtotime('now'));
                $reg->apply = 1;

                if ($reg->save()) {
                    session()->flash('success', 'Application sent');
                    return true;
                }

                session()->flash('error', 'server error');
                return false;
            }
            session()->flash('warning', 'You have already applied');
            return false;
        }

        // it means that the user already applied
        session()->flash('warning', 'You have to register first');
        return false;
    }
}
