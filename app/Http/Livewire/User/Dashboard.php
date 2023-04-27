<?php

namespace App\Http\Livewire\User;

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

    public array $trainingCourse = [];
    public array $trainingCenter = [];
    public array $trainingHours = [];
    public array $trainingCertificates = [];


    public $dataValue = ["region" => 'Region V (Bicol Region)', 'province' => 'Camarines Sur', 'municipality' => 'Iriga City', 'barangay' => "Niño Jesus"];

    public function mount() {
        $this->givenName = "";
        $this->middleName  = "";
        $this->surName  = "";
        $this->tel  = 0;
        $this->region  = "";
        $this->province  = "";
        $this->municipality  = "";
        $this->barangay  = "";
        $this->email  = "";
        $this->pob  = "";
        $this->dob  = "";
        $this->gender  = "";
        $this->citizenship  = "";
        $this->civilStatus  = "";
        $this->university  = "";
        $this->degree  = "";
        $this->incYears  = 0;
    }
    public function render()
    {
        return view('livewire.user.dashboard')->layout('layouts.layout');
    }

    public function submit() {
        dd($this->givenName, $this->middleName, $this->surName, $this->tel, $this->region, $this->province, $this->municipality, $this->barangay, $this->email, $this->pob, $this->dob, $this->gender, $this->citizenship, $this->civilStatus, $this->university, $this->degree, $this->incYears, $this->trainingCourse, $this->trainingCenter, $this->trainingHours, $this->trainingCertificates);
    }
}
