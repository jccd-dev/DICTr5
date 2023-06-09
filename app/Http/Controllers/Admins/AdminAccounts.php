<?php

namespace App\Http\Controllers\Admins;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\EmailAdminAccount;
use App\Models\Admin\AdminModel;
use App\Helpers\AdminLogActivity;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

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
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @uses ADD_ADMIN
     * @description Function for creating new admin then send an email message login credential
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
        AdminLogActivity::addToLog("create new admin", session()->get('admin_id'));

        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'url' => route('admin.login'),
            'name' => $request->name,
            'intended_for' => 'Sent Admin Account Credential',
        ];
        Mail::to($request->email)->send(new EmailAdminAccount($data));
        // return success msg with admin name for confirmation

        return response()->json([
            'success' => 'New admin Inserted',
            'admin'   => [
                'name' => $new_admin->name
            ]
        ], 200);
    }

    /**
     * @param int $admin_id admin_id unique id of admin from the table
     * @return string rendered view, can be use for modal or another display. (component)
     */
    public function access_admin(int $admin_id): string
    {
        $admin_data = AdminModel::find($admin_id);
        return view('components.admin.update-admin-account-modal', compact('admin_data'))->render();
    }

    /**
     * @param Request $request
     * @param int $admin_id
     * @return JsonResponse
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @uses UPDATE_ADMIN
     * @description update admin account then send an email for the new update.
     */
    public function update_admin(Request $request, int $admin_id): JsonResponse
    {

        $validator = Validator::make($request->all(), $this->rules);

        if (!$validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $admin_to_update = AdminModel::find($admin_id);
        // dd($request->post('name'));
        $admin_to_update->email = $request->post('email');
        $admin_to_update->password = $request->post('password');
        $admin_to_update->name = $request->post('name');
        $admin_to_update->office = $request->post('office');
        $admin_to_update->role = $request->post('role');
        $admin_to_update->designation = $request->post('designation');

        if (!$admin_to_update->save()) {
            return response()->json(['error' => 'Server Error'], 500);
        }

        AdminLogActivity::addToLog("update admin {$admin_to_update->name}", session()->get('admin_id'));
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'url' => route('admin.login'),
            'intended_for' => ''
        ];

        Mail::to($request->email)->send(new EmailAdminAccount($data));

        return response()->json(['admn' => $admin_to_update->name], 200);
    }

    /**
     * @param int $admin_id
     * @return bool
     * @uses DELETE_ADMIN
     * @description delete the account of an admin in the system.
     */
    public function delete_admin(int $admin_id): bool
    {

        $admin_to_delete = AdminModel::find($admin_id);

        AdminLogActivity::addToLog("delete admin {$admin_to_delete->name}", session()->get('admin_id'));
        return $admin_to_delete->delete() > 0;
    }
}
