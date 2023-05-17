<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\AdminModel;
use Illuminate\View\View;

class AdminAccounts extends Controller
{

    public array $rules = [
        'email'         => 'required|email',
        'password'      => 'required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/',
        'name'          => 'required',
        'office'        => 'required',
        'role'          => 'required',
        'designation'   => 'required'
    ];

    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel;
    }

    //TODO: view for adding new admins
    public function render(): View
    {

        $admins = AdminModel::all();
        return view('AdminFunctions.admin-accounts', ['data' => $admins]);
    }

    /**
     * @param mixed $request
     * @return
     * @description Function for creating new admin
     */
    public function add_admin(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $new_admin = new AdminModel();
        $new_admin->fill([
            'email'       => $request->email,
            'password'    => $request->password,
            'name'        => $request->name,
            'office'      => $request->office,
            'role'        => $request->role,
            'designation' => $request->designation,
        ]);

        if (!$new_admin->save()) {
            // return server error if data not isnerted to database
            return response()->json(['error' => 'Server Error'], 500);
        }

        // TODO: inserted admin should receive an email with the password of his/her account

        // return success msg with admin name for confirmation
        return response()->json([
            'success' => 'New admin Inserted',
            'admin'   => [
                'name' => $new_admin->name
            ]
        ], 200);
    }

    /**
     * @param int admin_id unique id of admin from the table
     * @return string rendered view, can be use for modal or another display. (component)
     */
    public function access_admin(int $admin_id): string
    {
        $admin_data = AdminModel::find($admin_id);
        return view('', compact('admin_data'))->render();
    }

    public function update_admin(Request $request, int $admin_id): JsonResponse
    {

        $validator = Validator::make($request->all(), $this->rules);

        if (!$validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $admin_to_update = AdminModel::find($admin_id);

        $admin_to_update->email = $request->email;
        $admin_to_update->password = $request->password;
        $admin_to_update->name = $request->name;
        $admin_to_update->office = $request->office;
        $admin_to_update->role = $request->role;
        $admin_to_update->designation = $request->designation;

        if (!$admin_to_update->save()) {
            return response()->json(['error' => 'Server Error'], 500);
        }

        return response()->json(['admn' => $admin_to_update->name], 200);
    }

    public function delete_admin(int $admin_id): bool
    {

        $admin_to_delete = AdminModel::find($admin_id);

        return $admin_to_delete->delete() > 0;
    }
}
