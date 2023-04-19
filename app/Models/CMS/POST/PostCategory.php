<?php

namespace App\Models\CMS\POST;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class PostCategory extends Model
{
    use HasFactory;

    protected $table = 'post_categories';
    protected $guarded = [
      'id'
    ];
    protected $fillable = [
        'category'
    ];

    public function post() :HasMany{
        return $this->hasMany(PostModel::class, 'category_id', 'id');
    }

    /**
     *  check if category to be inserted is already exists
     * @param string $category
     * @return bool
     */
    public static function isExist(string $category) :bool{
        return DB::table('post_categories')->where('category', $category)->exists();
    }


}
