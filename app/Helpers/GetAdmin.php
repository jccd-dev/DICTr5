<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class GetAdmin {

    /**
     * @return array
     * @description get the current logged in admin ID and name
     */
    public static function get_admin(): array
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // User is authenticated, retrieve the authenticated user
            $admin = Auth::user();

            // Access the 'role' property
            $admin_id = $admin->id;
            $name = $admin->name;
            return [
                'id'   => $admin_id,
                'name' => $name
            ];
        }

        return [
            'id'     => 1, //default to super admin,
            'name' => 'Anonymous'
        ];
    }
}
