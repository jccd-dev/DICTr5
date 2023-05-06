<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UsersData extends Model
{
    use HasFactory;

    protected $table = 'users_data';
    protected $fillable = [
        'user_login_id',
        'fname',
        'lname',
        'mname',
        'password',
        'place_of_birth',
        'gender',
        'citizenship',
        'civil_status',
        'contact_number',
        'present_office',
        'designation',
        'telephone_number',
        'office_address',
        'office_category',
        'no_of_years_in_pos',
        'programming_langs',
        'e_sign',
        'current_status',
        'date_accomplished',
    ];

    public $timestamps = false;
    public function userLogin(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_login_id');
    }

    public function addresses(): HasOne
    {
        return $this->hasOne(Addresses::class, 'user_id', 'id');
    }

    public function regDetails(): HasOne
    {
        return $this->hasOne(RegDetails::class, 'user_id', 'id');
    }

    public function submittedFiles(): HasMany
    {
        return $this->hasMany(SubmittedFiles::class, 'user_id', 'id');
    }

    public function tertiaryEdu(): HasOne
    {
        return $this->hasOne(TertiaryEducation::class, 'user_id', 'id');
    }

    public function trainingSeminars(): HasMany
    {
        return $this->hasMany(TrainingSeminars::class, 'user_id', 'id');
    }

    public function userHistory(): HasMany
    {
        return $this->hasMany(UserHistory::class, 'user_id', 'id');
    }

    public function userLogs(): HasMany
    {
        return $this->hasMany(UserLogs::class, 'user_id', 'id');
    }
}
