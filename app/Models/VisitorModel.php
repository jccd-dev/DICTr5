<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model{

    use HasFactory;

    protected $table = 'visitor_count';
    public $timestamps = false;

    protected $fillable = ['visitors'];
}
