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

    // accessor method to automatically retrieve full name
    public function getFormattedNameAttribute(): string
    {
        $fname = $this->fname;
        $lname = $this->lname;

        return "{$fname} {$lname}";
    }



}
