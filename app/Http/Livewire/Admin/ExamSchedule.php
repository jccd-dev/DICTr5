<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin\ExamSchedule as ExamScheduleModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ExamSchedule extends Component
{
    public $from;
    public $to;
    public $search;
    public $schedules;

    public $datetime;
    public $venue;
    public $exam_set;
    public $update_exam_set;
    public $update_datetime;
    public $update_venue;
    public $update_id;

    public function render()
    {  
        $exam_schedule_model = new ExamScheduleModel();
        $this->schedules = $exam_schedule_model->filter_content($this->from, $this->to, $this->search);
        return view('livewire.admin.exam-schedule')
                ->layout('livewire.layout.laravel_layout');
    }

    public function mount(){
        date_default_timezone_set("Asia/Manila");

        $this->resetUpdateField();

        $date_from = ExamScheduleModel::select(DB::raw('MIN(datetime) as min_datetime'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_datetime));
        $date_to = ExamScheduleModel::select(DB::raw('MAX(datetime) as max_datetime'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_datetime));
    }

    public function resetUpdateField(){
        $this->update_datetime = '';
        $this->update_exam_set = '';
        $this->update_venue = '';
    }

    public function create_event_schedule(){
        $validateData = $this->validate(
            [
                'datetime' => 'required',
                'venue' => 'required',
                'exam_set' => 'required',
            ],
            [
                'datetime.required' => 'Exam Schedule field is required',
                'venue.required' => 'Exam Venue field is required',
                'exam_set.required' => 'Exam Set field is required',
            ]

        );
        $status = ExamScheduleModel::create($validateData);
        
        $this->resetCreateForm();
        $this->dispatchBrowserEvent('ExamScheduleCreated', $status);

    }

    public function selectVenue($venue){
        $this->venue = $venue;
    }

    public function selectUpdatedVenue($venue){
        $this->update_venue = $venue;
    }

    public function resetCreateForm(){
        $this->datetime = '';
        $this->venue = '';
        $this->exam_set = '';
    }
    public function delete_exam_schedule($id){
        $schedule = new ExamScheduleModel();
        return $schedule->deleteSchedule($id);
    }

    public function update_field($id){
        $sched = ExamScheduleModel::where('id', $id)->first();
        $this->update_id = $id;
        $this->update_exam_set = $sched->exam_set;
        $this->update_datetime = $sched->datetime;
        $this->update_venue = $sched->venue;
    }

    public function update_event_schedule(){
        $validateData = $this->validate(
            [
                'update_datetime' => 'required',
                'update_venue' => 'required',
                'update_exam_set' => 'required',
            ],
            [
                'update_datetime.required' => 'Exam Schedule field is required',
                'update_venue.required' => 'Exam Venue field is required',
                'update_exam_set.required' => 'Exam Set field is required',
            ]
        );

        $exam_schedule_model = new ExamScheduleModel();
        $status = $exam_schedule_model->updateSchedule($this->update_id, [
            'exam_set' => $this->update_exam_set,
            'venue' => $this->update_venue,
            'datetime' => $this->update_datetime,
        ]);
        $this->resetUpdateField();
        $this->dispatchBrowserEvent('UpdateSchedule', $status);

    }
}
