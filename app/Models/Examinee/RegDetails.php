<?php

namespace App\Models\Examinee;

use App\Models\Admin\ExamSchedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegDetails extends Model
{
    use HasFactory;

    protected $table = 'reg_details';
    public $timestamps = false;
    protected $fillable = [
      'user_id',
      'exam_schedule_id',
      'reg_date',
      'approved_date',
      'venue',
      'assigned_exam_set',
      'status',
    ];

    public function usersData() :BelongsTo{
        return $this->belongsTo(UsersData::class, 'user_id');
    }

    public function examSchedule(): BelongsTo
    {
        return $this->belongsTo(ExamSchedule::class, 'exam_schedule_id');
    }

}
