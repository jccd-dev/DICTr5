<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tech4EdModel extends Model
{

    use HasFactory;
    protected $table = 'tech4ed';
    public $timestamps = false;
    protected $fillable = [
        'courses'
    ];


}
