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

    public $timestamps = false;
    protected $fillable = [
        'user_login_id',
        'email',
        'fname',
        'lname',
        'mname',
        'password',
        'place_of_birth',
        'date_of_birth',
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
        'year_level',
        'current_status',
        'add_info',
        'is_retaker',
        'date_accomplish',
    ];

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

    /**
     * @return string
     * @description Accessor method to format Full name directly on eloquent statement
     */
    public function getFormattedNameAttribute(): string
    {
        $first_name = $this->fname;
        $middle_name = $this->mname;
        $last_name = $this->lname;

        return "{$last_name}, {$first_name} {$middle_name}";
    }

    public function userHistoryLatest(): HasOne
    {
        return $this->hasOne(UserHistory::class, 'user_id', 'id')->latest('timestamp');
    }
}
