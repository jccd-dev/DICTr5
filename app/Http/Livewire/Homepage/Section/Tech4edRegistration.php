<?php

namespace App\Http\Livewire\Homepage\Section;

use App\Models\CMS\Feedback;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use WireUi\Traits\Actions;

class Tech4edRegistration extends Component
{
    use Actions;
    public bool $register_modal;
    public string $name;
    public string $organization;
    public string $cp_number;
    public string $email;
    public string $tech4ed_course_training;
    public $tech4ed_choices;

    protected $rules = [
        'name' => 'required',
        'organization' => 'required',
        'cp_number' => 'required|max:11|min:11',
        'tech4ed_course_training' => 'required',
        'email' => 'required|email',
    ];

    protected $messages = [
        'cp_number.min' => 'Invalid cellphone number',
        'cp_number.max' => 'Invalid cellphone number',
    ];

    public function render()
    {
        return view('livewire.homepage.section.tech4ed-registration');
    }

    public function mount(){
        $this->register_modal = false;
        $this->tech4ed_choices = DB::table('tech4ed')->get();
    }

    public function open_registration_form(){
        $this->register_modal = true;
    }

    public function create_registration(){
        $this->validate();
        Feedback::create([
            'name' => $this->name,
            'email' => $this->email,
            'organization' => $this->organization,
            'cp_number' => $this->cp_number,
            'tech4ed_course_training' => $this->tech4ed_course_training,
            'is_tech4ed' => 1
        ]);
        $this->reset_input();
        $this->notification()->success(
            $title = 'Tech4Ed Registration',
            $description = 'You successfully submitted Tech4Ed registration'
        );
        $this->register_modal = false;
    }

    public function reset_input(){
        $this->name = '';
        $this->email = '';
        $this->organization = '';
        $this->cp_number = '';
        $this->tech4ed_course_training = '';
    }
}
