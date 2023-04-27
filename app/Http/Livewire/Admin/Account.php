<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\AdminModel;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Account extends Component
{
    public string $email;
    public string $password;

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
//    public function authenticate() :void
//    {
//        $validator = Validator::make([
//            'email'     => $this->email,
//            'password'  => $this->password,
//        ], $this->rules);
//
//        if ($validator->fails()) {
//            $err_messages = $validator->getMessageBag();
//            dd($err_messages);
//            foreach ($err_messages->getMessages() as $field => $messages) {
//                foreach ($messages as $message) {
//                    $this->addError($field, $message);
//                }
//            }
//            $err_messages = $validator->getMessageBag();
//            $this->dispatchBrowserEvent('ValidationErrors', $err_messages->getMessages());
//            return;
//        }
//
//        $validatedData = $validator->validated();
//
//        if (!$token = auth('jwt')->attempt($validatedData)){
//            session()->flash('invalid', 'Invalid Email or Password');
//        }
//
//        // set the token into cookie
//
//
//    }

    public function render()
    {
        return view('livewire.admin.login');
    }
}
