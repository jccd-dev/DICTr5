<?php

namespace App\Models\CMS\POST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class PostImages extends Model
{
    protected $table = 'post_images';
    public $timestamps = false;

    protected $fillable = [
        'post_id',
        'image_filename'
    ];

    public function post() : BelongsTo {
        return $this->belongsTo(PostModel::class);
    }
}
