<?php

namespace App\Models\Admin;

use App\Models\Examinee\RegDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class ExamSchedule extends Model
{
    use HasFactory;

    protected $table = 'exam_schedules';

    protected $fillable = ['venue', 'exam_set', 'start_date', 'end_date'];

    public $timestamps = false;

    public function filter_content($from, $to, $search = null){
        if($this->search != null || $this->search != ''){
            return DB::table($this->table)->where('start_date', '<=', date("Y-m-d H:i:s", strtotime($to)))
                                ->where('end_date', '>=', date('Y-m-d H:i:s', strtotime($from)))
                                ->orderBy('start_date', 'desc')
                                ->get();
        }else{
            return DB::table($this->table)->where('venue',  'LIKE', '%'.$search.'%')
                                ->orWhere('exam_set', 'LIKE', '%'.$search.'%')
                                ->orderBy('start_date', 'desc')
                                ->get();
        }
    }

    public function deleteSchedule($id){
        return DB::table($this->table)->delete($id);
    }

    public function updateSchedule($id, $data){
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function regDetails(): HasMany
    {
        return $this->hasMany(RegDetails::class, 'exam_schedule_id', 'id');
    }
}
