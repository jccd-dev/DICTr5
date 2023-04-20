<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegDetails extends Model
{
    use HasFactory;

    protected $table = 'reg_details';
    protected $fillable = [
      'user_id',
      'reg_date',
      'approved_date',
      'exam_date',
      'venue',
      'assigned_exam_set',
      'status',
    ];

    public function usersData() :BelongsTo{
        return $this->belongsTo(Users::class, 'user_id');
    }

    //todo add exam schedule connections


}
