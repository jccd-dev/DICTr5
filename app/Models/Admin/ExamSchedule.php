<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExamSchedule extends Model
{
    use HasFactory;

    protected $table = 'exam_schedules';
    
    protected $fillable = ['venue', 'exam_set', 'datetime'];

    public $timestamps = false;

    public function filter_content($from, $to, $search = null){
        if($this->search != null || $this->search != ''){
            return DB::table($this->table)->where('datetime', '<=', date('Y-m-d 23:59:00', strtotime($to)))
                                ->where('datetime', '>=', $from)
                                ->orderBy('datetime', 'desc')
                                ->get();
        }else{
            return DB::table($this->table)->where('venue',  'LIKE', '%'.$search.'%')
                                ->orWhere('exam_set', 'LIKE', '%'.$search.'%')
                                ->orderBy('datetime', 'desc')
                                ->get();
        }
    }

    public function deleteSchedule($id){
        return DB::table($this->table)->delete($id);
    }

    public function updateSchedule($id, $data){
        return DB::table($this->table)->where('id', $id)->update($data);
    }
}
