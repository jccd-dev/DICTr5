<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\AdminModel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component
{
    public string $email = '';
    public string $password = '';

    protected $rules = [
        'email'     => 'required|email',
        'password'  => 'required'
    ];
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    /**
     * @throws ValidationException
     */
    public function authenticate(Request $request)
    {
        $validator = Validator::make([
            'email'     => $this->email,
            'password'  => $this->password,
        ], $this->rules);

        // validate submitted data
        if ($validator->fails()) {
            $err_messages = $validator->getMessageBag();
            foreach ($err_messages->getMessages() as $field => $messages) {
                foreach ($messages as $message) {
                    $this->addError($field, $message);
                }
            }
            $err_messages = $validator->getMessageBag();
            $this->dispatchBrowserEvent('ValidationErrors', $err_messages->getMessages());
            return;
        }

        $validatedData = $validator->validated();

        // create the token
        if (!$token = auth('jwt')->attempt($validatedData)){
            session()->flash('invalid', 'Invalid Email or Password');

            // In case it need to use an API
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Get the authenticated user
        $user = auth()->user();
        // Store the admin's role in the session
        session(['admin_role' => $user->role, 'admin_id' => $user->id]);

        //store in cookie
        Cookie::queue('jwt_token', $token, 240); // expire after 5 hours
        return redirect('/admin/dashboard');
    }
    public function render()
    {
        return view('livewire.admin.login')->layout("layouts.static-layout");
    }
}
