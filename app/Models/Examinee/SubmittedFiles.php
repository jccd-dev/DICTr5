<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmittedFiles extends Model{

    use HasFactory;

    protected $table = 'submitted_files';
    protected $fillable = [
        'user_id',
        'file_name',
        'file_type',
        'requirement_type'
    ];

    public function usersData() :BelongsTo
    {
        return $this->belongsTo(UsersData::class, 'user_id');
    }

}
