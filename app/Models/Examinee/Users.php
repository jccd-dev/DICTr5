<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user_login';
    protected $fillable = [
        'google_id',
        'email',
        'fname',
        'lname'
    ];

    public $timestamps = false;

    public function usersdata(): HasOne
    {
        return $this->hasOne(UsersData::class, 'user_login_id', 'id');
    }


}
