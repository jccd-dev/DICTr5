<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminLogs extends Model
{
    use HasFactory;
    use SoftDeletes;

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
