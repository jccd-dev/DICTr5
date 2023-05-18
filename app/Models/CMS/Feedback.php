<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';

    protected $fillable = [
        'content',
        'name',
        'cp_number',
        'email',
        'is_read',
        'is_tech4ed',
        'organization',
        'tech4ed_course_training',
        'is_archived',
    ];

    public $timestamps = false;
}
