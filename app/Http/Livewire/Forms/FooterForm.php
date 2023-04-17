<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class FooterForm extends Component
{
    public string $email;
    public string $message;
    public string $test;

    public function __construct() {

    }

    public function submit() {

    }

    public function render()
    {
        return view('livewire.forms.footer-form');
    }
}
