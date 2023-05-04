<?php

namespace App\Http\Livewire\User;

use App\Helpers\FileHandler;
use App\Models\Examinee\UsersData;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Dashboard extends Component
{
    use WithFileUploads;
    public $cardModal;
    public string $testing;
    public string $givenName;
    public string $middleName;
    public string $surName;
    public int $tel;
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
    public int $incYears;

    public string $currentStatus;


    public Collection $trainings;

    public int $yearLevel;
    public string $presentOffice;
    public int $telNum;
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

    private $user_id = null;

    public $dataValue = ["region" => 'Region V (Bicol Region)', 'province' => 'Camarines Sur', 'municipality' => 'Iriga City', 'barangay' => "Niño Jesus"];

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
        'passport'      => "required|mimes:jpg,jpeg,png|max:5120|dimensions:min_width=826,min_height=1062|max:5120",
        'psa'           => "required|mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'validId'       => "required|mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
        'diploma'       => "required|mimes:jpg,jpeg,png,doc,pdf,docx|max:5120|max:5120",
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
        'yearsPresentPosition'=> "required|numeric"
    ];

    protected $except = ['cardModal'];

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    }

    public function mount() {
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

        $this->currentStatus = '';

        $this->yearLevel = 0;
        $this->presentOffice = '';
        $this->telNum = 0;
        $this->officeAddress = '';
        $this->officeCategory = '';
        $this->designationPosition = '';
        $this->yearsPresentPosition = '';

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
        return view('livewire.user.dashboard')->layout('layouts.user-layouts');
    }

    public function popInput() {
        if (count($this->trainings) != 1)
            $this->trainings->pop();
    }

    public function addInput() {
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
        if (strtolower($this->currentStatus) == 'student'){
            $this->rules = array_merge($this->rules, $this->student_rule);
        }else {
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
            'yearsPresentPosition'=> $this->yearsPresentPosition

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
            'user_login_id'     => session()->get('user')['id'],
            'fname'             => $this->givenName,
            'lname'             => $this->lname,
            'mname'             => $this->mname,
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
            'no_of_years_in_pos'=> $this->yearsPresentPosition,
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
            'degree'            =>$this->degree,
            'inclusive_years'   => $this->incYears
        ];

        $organized_users_data = [
            'main_data' => $users_data,
            'address'   => $address,
            'ter_edu'   => $tertiary_edu
        ];

        $this->insert_users_data($organized_users_data);

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
        if($user->save()){
            $user_id = $user->id;
            $lname = $user->lname;

            // insert into tertiary education table
            $user->tertiaryEdu()->create($organized_data['ter_edu']);

            // insert into training seminars table
            $user->trainingSeminars()->createMany($this->trainings);

            // insert into address table
            $user->addresses()->create($organized_data['address']);

            $submit = $user->submittedFiles();
            // insert files into folder and database
            $this->passport != null ? $file_helper->store_files($this->passport, $submit, 'passport', $lname) : null;
            $this->psa != null ? $file_helper->store_files($this->psa, $submit, 'psa', $lname) : null;
            $this->validId != null ? $file_helper->store_files($this->validId, $submit, 'validId', $lname) : null;
            $this->diploma != null ? $file_helper->store_files($this->diploma, $submit, 'diploma', $lname) : null;

            // insert into registration details table
            $user->regDetails()->create(['reg_date' => $user->date_accomplish]);

            return true;
        }

        return false;
    }
}
