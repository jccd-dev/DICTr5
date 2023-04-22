<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserHistory extends Model {

    use HasFactory;

    protected $table = 'user_history';
    protected $fillable = [
        'user_id',
        'registration_date',
        'approved_date',
        'schedule',
        'venue',
        'assigned_exam_set',
        'status',
    ];

    public function usersData() : BelongsTo{
        return $this->belongsTo(UsersData::class, 'user_id');
    }


}
