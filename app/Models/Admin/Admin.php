<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash as FacadesHash;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'admin';

     /**
     * TITLE: CREATE ADMIN
     * Description: Insert admin data in admin table
     * @param array $data: array data of admin that will be inserted to database
     *                     it can be an associative array or multidimensional array
     *                     - name => string value
     *                     - role => string value
     *                     - email => string value
     *                     - password => string value
     *                     - office => string value
     *                     - position => string value
     *
     * @return boolean $create_admin: identify if inserting is success or not
     */
    public function create_admin(array $data): bool {
        $create_admin = DB::table($this->table)->insert($data);

        return $create_admin;
    }

    /**
     * TITLE: RETRIEVE ADMIN DATA
     * Description: Retrieve admin data
     * @param array $id: id to be retrieved
     * @return collection of StdClass: $admin_data: admin data
     */
    public function get_admin(string $id){
        $admin_data = DB::table($this->table)->where('id', $id)->first();

        return $admin_data;
    }

    /**
     * TITLE: ADMIN LOGIN AUTHENTICATION
     * Description: checks the admin credential using of neither username or password and password.
     *              in the database
     *  @param string $username_email: string value
     *                $password: string value
     * @return boolean : check if the input login credential of admin exists
     */
    public function authenticate_admin(string $username_email, string $password):  bool {
        // Check if the input email and password exists in the database
        $account = DB::table($this->table)->where('username', $username_email)->orWhere('email', $username_email)->first();
        if($account){
            // If exists, then check if the password matched to the database
            if(FacadesHash::check($password, $account->password)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}
