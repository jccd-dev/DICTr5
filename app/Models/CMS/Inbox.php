<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    use HasFactory;
    protected $table = 'inbox';
    public $timestamps = false;

    protected $fillable = [
        'user',
        'email',
        'intended_for',
        'is_archived',
    ];
}
