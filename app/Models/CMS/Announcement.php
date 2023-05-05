<?php
//  ADDED 'status' COLUMN IN THE ANNOUNCEMENT TABLE
//  SQL COMMAND: ALTER TABLE `announcements` ADD `status` TINYINT(2) NOT NULL AFTER `author`;

namespace App\Models\CMS;

use App\Models\Admin\AdminModel;
use ArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use stdClass;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcements';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cat_id',
        'admin_id',
        'title',
        'excerpt',
        'content',
        'author',
        'status',
        'start_duration',
        'end_duration',
    ];

    public function admin():BelongsTo {
        return $this->belongsTo(AdminModel::class, 'admin_id');
    }
    /**
     * TITLE: RETRIEVING ALL ANNOUNCEMENT
     * Description: getting all announcement data from the database
     * @return instance of the Illuminate\Database\Eloquent\Collection class
     */
    public function get_all_announcement(){
        return DB::table($this->table)
            ->orderBy('timestamp', 'desc')
            ->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
            ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
            ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
            ->get();
    }


    /**
     * TITLE: CREATE ANNOUNCEMENT
     * Description: inserting announcement in the announcement table in the database
     * @param array $data: contains list of attributes to be inserted in the database
     *                      - cat_id => int value
     *                      - title => string value
     *                      - excerpt => string value
     *                      - content => string value
     *                      - author => int value
     *                      - status => string value
     * @return bool : identifies if the announcement is created
     */
    public function create_announcement(array $data): bool{
        $announcement = DB::table($this->table)->insert($data);

        return $announcement;
    }

    /**
     * TITLE: UPDATE THE ANNOUNCEMENT
     * Description: Updating a row in announcement table in the database
     * @param array $data: contains the list of attributes to be updated in the database
     *                  - cat_id => int value
     *                  - title => string value
     *                  - excerpt => string value
     *                  - content => string value
     *                  - status => string value
     * @param int $id: id of a specific row in the announcement table
     * @return bool : identifies if the row is successfully updated
     */
    public function update_announcement(array $data, int $id): bool{
        $updated_announcement = DB::table($this->table)->where('id', $id)->update($data);
        return $updated_announcement;
    }

    /**
     * TITLE: RETRIEVE SPECIFIC ANNOUNCEMENT
     * Description: get specific announcement row by id
     * @param int $id: announcement id
     * @return instance of the Illuminate\Database\Eloquent\Collection class
     */
    public function  get_announcement(int $id): stdClass{
        return DB::table($this->table)->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                                    ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                                    ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                                    ->where('announcements.id', $id)
                                    ->first();
    }

    /**
     * TITLE: SEARCH ANNOUNCEMENT WITH FILTER
     * Description: search announcement data using range of dates, category, and texts
     * @param string $from: date range from
     * @param string $to: date range to
     * @param int $category: post_category id
     * @param string $search: search text
     *
     * @return instance of the Illuminate\Database\Eloquent\Collection class
     */
    public function filter_search(string|null $from, string|null $to, int $category = null, string $search = null){
        if($from == null || $to == null){
            return DB::table($this->table)->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                ->orderBy('announcements.start_duration', 'desc')
                ->get();
        }
        if($search == null || $search == ''){
            if($category == null || $category == 0)
                return DB::table($this->table)->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                                            ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                                            ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                                            ->where('announcements.start_duration', '<=', $to)
                                            ->where('announcements.start_duration', '>=', $from)
                                            ->orderBy('announcements.start_duration', 'desc')
                                            ->get();
            else
                return DB::table($this->table)->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                                            ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                                            ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                                            ->where('announcements.start_duration', '<=', $to)
                                            ->where('announcements.start_duration', '>=', $from)
                                            ->where('announcements.cat_id', $category)
                                            ->orderBy('announcements.start_duration', 'desc')
                                            ->get();
        }else{
            return $this->search_announcement($search);
        }
    }

    /**
     * TITLE: SEARCH ANNOUNCEMENT BY TEXT
     * Description: searching announcement through title, excerpt, and content column
     *              in the announcement table
     * @param string $data: text to be searched
     * @return instance of the Illuminate\Database\Eloquent\Collection class
     */
    public function search_announcement(string $data){
        return DB::table($this->table)->join('dict_admins', 'announcements.admin_id', '=', 'dict_admins.id')
                                    ->join('post_categories', 'announcements.cat_id', '=', 'post_categories.id')
                                    ->select('announcements.*', 'dict_admins.name as author_name', 'post_categories.category as category')
                                    ->where('announcements.title', 'like', '%'.$data.'%')
                                    ->orWhere('announcements.excerpt', 'like', '%'.$data.'%')
                                    ->orWhere('announcements.content', 'like', '%'.$data.'%')
                                    ->orWhere('post_categories.category', 'like', '%'.$data.'%')
                                    ->orderBy('announcements.start_duration', 'desc')
                                    ->get();
    }


    /**
     FUNCTION: SCOPE PRIORITY
     * @description:  SCOPE Method for PRIORITY ANNOUNCEMENT retrieval
     * Can be use as
     * $priorites = Announcement::priority()->get();
     * return 3 prioritized announcements
     */
    public function scopePriority($query) {
        return $query->where('status', 1)->orderBy('timestamp', 'acs')->limit(3);
    }

}
