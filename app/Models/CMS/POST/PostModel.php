<?php

namespace App\Models\CMS\POST;

use App\Models\Admin\AdminModel;
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
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(AdminModel::class, 'admin_id');
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

    public function filter_search(string $from, string $to, int $category = null, string $search = null){
        if(!$from){
            $from = date('Y-m-d');
        }
        if($search == null || $search == ''){
            if($category == null || $category == 0)
                return DB::table('posts')
                    ->select('*')
                    ->where('timestamp', '<=', $to)
                    ->where('timestamp', '>=', $from)
                    ->orderBy('timestamp', 'desc')
                    ->get();
            else
                return DB::table('posts')
                    ->select('*')
                    ->where('timestamp', '<=', $to)
                    ->where('timestamp', '>=', $from)
                    ->where('category_id', $category)
                    ->orderBy('timestamp', 'desc')
                    ->get();
        }else{
            return $this->search($search);
        }
    }

    public function search(string $data){
        return DB::table('posts')->join('dict_admins', 'posts.admin_id', '=', 'dict_admins.id')
            ->join('post_categories', 'posts.category_id', '=', 'post_categories.id')
            ->select('posts.*', 'dict_admins.name as author_name', 'post_categories.category as category')
            ->where('posts.title', 'like', '%'.$data.'%')
            ->orWhere('dict_admins.name', 'like', '%'.$data.'%')
            ->orWhere('post_categories.category', 'like', '%'.$data.'%')
            ->orWhere('posts.status', 'like', '%'.$data.'%')
            ->orderBy('posts.timestamp', 'desc')
            ->get();
    }
}
