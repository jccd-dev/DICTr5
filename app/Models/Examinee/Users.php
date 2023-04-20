<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $table = 'user_login';
    protected $fillable = [
        'google_id',
        'email',
        'fname',
        'lname',
        // 'mname',
        // 'password',
        // 'place_of_birth',
        // 'gender',
        // 'citizenship',
        // 'civil_status',
        // 'contact_number',
        // 'present_office',
        // 'designation',
        // 'telephone_number',
        // 'office_address',
        // 'office_category',
        // 'no_of_years_in_pos',
        // 'programming_langs',
        // 'e_sign',
        // 'date_accomplished',
    ];

    public $timestamps = false;
}
