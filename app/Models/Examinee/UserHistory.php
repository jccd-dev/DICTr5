<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserHistory extends Model
{

    use HasFactory;

    protected $table = 'user_history';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'registration_date',
        'approved_date',
        'schedule',
        'venue',
        'exam_set',
        'status',
        'exam_result'
    ];

    public function usersData(): BelongsTo
    {
        return $this->belongsTo(UsersData::class, 'user_id');
    }

    public function failedHistory(): HasOne
    {
        return $this->hasOne(FailedHistory::class, 'history_id', 'id');
    }
}
