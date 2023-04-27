<?php

namespace App\Http\Livewire\Forms;

use App\Models\CMS\Feedback;
use Livewire\Component;

class FooterForm extends Component
{
    public string $email;
    public string $message;
    public string $name;
    public string $cp_number;

    public function __construct() {

    }

    public function submit() {
        $validatedData = $this->validate(
            [
                'email' => 'required|email',
                'name' => 'required',
                'cp_number' => 'required',
                'message' => 'required',
            ],
            [
                'email.required' => 'Email field is required',
                'name.required' => 'Name field is required',
                'cp_number.required' => 'Cellphone Number field is required',
                'message.required' => 'Message field is required',
            ]

        );
        Feedback::create([
            'email' => $this->email,
            'name' => $this->name,
            'cp_number' => $this->cp_number,
            'content' => $this->message,
        ]);
        $this->email = '';
        $this->message = '';
        $this->dispatchBrowserEvent('FeedbackCreated', true);
    }

    public function render()
    {
        return view('livewire.forms.footer-form');
    }
}
