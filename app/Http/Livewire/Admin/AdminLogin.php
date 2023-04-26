<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminLogin extends Component
{
    public string $password;

//    public mixed $rules = [
//        "password" => "required|min_digits:8"
//    ];

public function mount() {
}


    public function render()
    {
        return view('livewire.admin.admin-login')->layout("layouts.layout");
    }
}
