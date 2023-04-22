<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrainingSeminars extends Model
{
    use HasFactory;

    protected $table = 'training_seminars';
    protected $fillable = [
        'user_id',
        'course_seminar',
        'training_center',
        'training_hours',
        'cert_files'
    ];

    public function usersData() :BelongsTo
    {
        return $this->belongsTo(UsersData::class, 'user_id');
    }
}
