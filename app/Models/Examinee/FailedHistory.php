<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FailedHistory extends Model
{
    use HasFactory;

    protected $table = 'failed_history';
    protected $fillable = [
        'history_id',
        'part_1',
        'part_2',
        'part_3'
    ];

    public $timestamps = false;

    public function user_history():BelongsTo
    {
        return $this->belongsTo(UserHistory::class, 'history_id');
    }
}
