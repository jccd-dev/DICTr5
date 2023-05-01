<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    public $dataValue = ["region" => 'Region V (Bicol Region)', 'province' => 'Camarines Sur', 'municipality' => 'Iriga City', 'barangay' => "Niño Jesus"];

    protected $rules = [
        'givenName' => "required|string",
        'middleName' => "required|string",
        'surName' => "required|string",
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
            'trainings' => collect([]),
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
        return view('livewire.user.dashboard')->layout('layouts.layout');
    }

    public function popInput() {
        $this->trainings->pop();
    }

    public function addInput() {
        $this->trainings->push([
            'course' => '',
            'center' => '',
            'hours' => '',
            'certificate' => ''
        ]);
//        dd(2);
    }

    public function submit() {
        dd(
            "givenName = " . $this->givenName,
            "middleName = " . $this->middleName,
            "surName = " . $this->surName,
            "tel = " . $this->tel,
            "region = " . $this->region,
            "province = " . $this->province,
            "municipality = " . $this->municipality,
            "barangay = " . $this->barangay,
            "email = " . $this->email,
            "pob = " . $this->pob,
            "dob = " . $this->dob,
            "gender = " . $this->gender,
            "citizenship = " . $this->citizenship,
            "civilStatus = " . $this->civilStatus,
            "university = " . $this->university,
            "degree = " . $this->degree,
            "incYears = " . $this->incYears,
            "currentStatus = " . $this->currentStatus,
            "trainings = " . json_encode($this->trainings),
            "yearLevel = " . $this->yearLevel,
            "presentOffice = " . $this->presentOffice,
            "telNum = " . $this->telNum,
            "officeAddress = " . $this->officeAddress,
            "officeCategory = " . $this->officeCategory,
            "designationPosition = " . $this->designationPosition,
            "yearsPresentPosition = " . $this->yearsPresentPosition,
            "pl = " . $this->pl,
            "passport = " . $this->passport,
            "psa = " . $this->psa,
            "cert = " . $this->cert,
            "validId = " . $this->validId,
            "diploma = " . $this->diploma,
            "signature = " . $this->signature
        );
    }
}
