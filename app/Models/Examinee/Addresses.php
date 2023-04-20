<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addresses extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'user_id',
        'region',
        'province',
        'municipality',
        'barangay'
    ];

    public function usersData(): BelongsTo
    {
        return $this->belongsTo(Users::class, 'user_id');
    }
}
