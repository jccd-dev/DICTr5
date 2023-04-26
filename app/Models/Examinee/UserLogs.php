<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLogs extends Model
{
    protected $table = 'user_logs';
    protected $fillable = [
        'user_id',
        'activity',
        'end_point'
    ];

    public function usersData(): BelongsTo {
        return $this->belongsTo(UsersData::class,'user_id');
    }
}
