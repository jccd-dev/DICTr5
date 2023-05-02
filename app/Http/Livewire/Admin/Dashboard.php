<?php

namespace App\Http\Livewire\Admin;

use App\Helpers\GetAdmin;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public array $admin_data = [];
    public function render()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // User is authenticated, retrieve the authenticated user
            $user = Auth::user();
            // Access the 'role' property
            $role = $user->role;
            $name = $user->name;
            return view('livewire.admin.dashboard',[
                'role' => $role,
                'name' => $name,
            ])->layout("layouts.layout");
        }
        return view('livewire.admin.dashboard')->layout("layouts.layout");
    }

    /**
     * @description use for logout redirect to log out route
     * @return null
     */
    public function logout(){
        return $this->redirect('/admin/logout');
    }
}
