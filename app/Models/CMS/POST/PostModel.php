<?php

namespace App\Models\CMS\POST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

/**
 * @property mixed $id
 *
 */
class PostModel extends Model
{
    use HasFactory;

    protected $table = 'posts';
    public $timestamps = false;
    protected $guarded = [
        'id',
        'timestamp',
    ];
    protected $fillable = [
      'category_id',
      'admin_id',
      'title',
      'excerpt',
      'thumbnail',
      'content',
      'vid_link',
      'author',
      'status'
    ];

    // images is connected to post table by foreign key and post can have multiple images
    public function images(): HasMany {
        return $this->hasMany(PostImages::class, 'post_id', 'id');
    }

    // post table is connected to category by foreign key and a category can have many post
    public function category(): BelongsTo {
        return $this->belongsTo(PostCategory::class);
    }

    /**
     * @description create or insert post data into database then return if
     *              the process if success(true) or failed(false)
     * @param array $post_data : validated and organized data from controller
     * @return bool
     */
    public function create_posts(array $post_data) :bool {
        return DB::table($this->table)->insertOrIgnore($post_data);
    }


    /**
     * @description update the post data into database
     * @param  string|int $post_id
     * @param array $post_data
     * @return bool
     */
    public function update_post(string|int $post_id,array $post_data) :bool {
        return DB::table($this->table)
            ->where('id', $post_id)
            ->update($post_data);
    }

    /**
     * @param string|int $post_id
     * @return bool
     */
    public function delete_post(string|int $post_id) :bool {
        return DB::table($this->table)
            ->where('id', $post_id)
            ->delete();
    }
}
