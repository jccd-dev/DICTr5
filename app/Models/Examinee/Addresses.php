<?php

namespace App\Models\Examinee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Addresses extends Model
{
    protected $table = 'addresses';
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'region',
        'province',
        'municipality',
        'barangay'
    ];

    public function usersData(): BelongsTo
    {
        return $this->belongsTo(UsersData::class, 'user_id');
    }

    public function getFormattedAddressAttribute(): string{
        $region = $this->region;
        $province = $this->province;
        $municipality = $this->municipality;
        $barangay = $this->barangay;

        return "{$barangay} {$municipality}, {$province}, {$region}";
    }
}
