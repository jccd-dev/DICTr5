<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class Login extends Component
{

    public string $password;

    public function mount() {
        $this->password = "";
    }
    public function render()
    {
        return view('livewire.admin.login')->layout("layouts.layout");
    }
}
