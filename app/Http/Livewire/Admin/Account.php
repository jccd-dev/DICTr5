<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\AdminModel;

use Livewire\Component;

class Account extends Component
{

    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    public function admin_login()
    {

    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
