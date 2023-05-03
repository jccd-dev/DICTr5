<?php

namespace App\Models\CMS;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_title',
        'admin_id',
        'category',
        'venue',
        'event',
        'start_date',
        'end_date',
        'timestamp',
    ];

    public $timestamps = false;

    public function admin(): BelongsTo{
        return $this->belongsTo(AdminModel::class, 'admin_id');
    }

    public function getAllEvent(){
        return DB::table($this->table)->join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                    ->select('calendar.*', 'dict_admins.name')
                                    ->get();
    }

    public function getEvent($id){
        return DB::table($this->table)->join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                    ->join('post_categories', 'calendar.category', '=', 'post_categories.id')
                                    ->where('calendar.id', $id)
                                    ->select('calendar.*', 'dict_admins.name as author', 'post_categories.category as category_name')
                                    ->first();
    }

    public function createEvent($data){
        return DB::table($this->table)->insertGetId($data);
    }

    public function updateEvent($id, $data){
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function deleteEvent($id){
        return DB::table($this->table)->delete($id);
    }
}
