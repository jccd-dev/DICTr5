<?php

namespace App\Models\Admin;

use App\Models\CMS\Announcement;
use App\Models\CMS\Calendar;
use App\Models\CMS\POST\PostModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AdminModel extends Authenticatable implements JWTSubject
{

    use HasFactory, Notifiable;

    protected $table = 'dict_admins';
    protected $fillable = [
        'email',
        'password',
        'name',
        'office',
        'role',
        'designation'
    ];

    protected $hidden = [
      'password', 'remember_token'
    ];

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the "remember me" token for the user.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the "remember me" token for the user.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the name of the "remember me" token for the user.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function getJWTCustomClaims()
    {
        return [];
    }


    // eloquent relation connections

    public function announcement(): HasMany{
        return $this->hasMany(Announcement::class, 'admin_id', 'id');
    }

    public function post(): HasMany {
        return $this->hasMany(PostModel::class, 'admin_id', 'id');
    }

    public function calendar(): HasMany {
        return $this->hasMany(Calendar::class, 'admin_id', 'id');
    }
}
