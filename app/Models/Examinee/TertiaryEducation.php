<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TertiaryEducation extends Model
{
    use HasFactory;

    protected $table = 'tertiary_edu';
    protected $fillable = [
        'user_id',
        'school_attended',
        'degree',
        'inclusive_years'
    ];

    public function usersData() : BelongsTo {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
