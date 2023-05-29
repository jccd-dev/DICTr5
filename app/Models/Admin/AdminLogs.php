<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminLogs extends Model
{
    use HasFactory;

    protected $table = 'admin_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'admin_id', 'activity', 'end_point'
    ];

    public $timestamps = false;

    public function admin(): BelongsTo{
        return $this->belongsTo(AdminModel::class, 'admin_id');
    }
}
