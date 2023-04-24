<?php

namespace App\Http\Livewire\Forms;

use App\Models\CMS\Feedback;
use Livewire\Component;

class FooterForm extends Component
{
    public string $email;
    public string $message;

    public function __construct() {

    }

    public function submit() {
        $validatedData = $this->validate(
            [
                'email' => 'required|email',
                'message' => 'required',
            ],
            [
                'email.required' => 'Email field is required',
                'message.required' => 'Message field is required',
            ]

        );
        Feedback::create([
            'email' => $this->email,
            'content' => $this->message
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
