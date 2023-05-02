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

    public $start_date;
    public $end_date;
    public $sched_date; // input
    public $sched_start_time; //input
    public $sched_end_time; // input
    public $venue;
    public $exam_set;

    public $update_exam_set;
    public $update_start_date;
    public $update_end_date;
    public $update_sched_date; // input
    public $update_sched_start_time; // input
    public $update_sched_end_time; // input
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

        $date_from = ExamScheduleModel::select(DB::raw('MIN(start_date) as min_datetime'))->first();
        $this->from = date('Y-m-d', strtotime($date_from->min_datetime));
        $date_to = ExamScheduleModel::select(DB::raw('MAX(start_date) as max_datetime'))->first();
        $this->to = date('Y-m-d', strtotime($date_to->max_datetime));
    }

    public function resetUpdateField(){
        // for inputs
        $this->update_sched_date = '';
        $this->update_sched_start_time = '';
        $this->update_sched_end_time = '';
        $this->update_exam_set = '';
        $this->update_venue = '';
    }

    public function create_event_schedule(){
        $validateData = $this->validate(
            [
                'sched_date' => 'required',
                'sched_start_time' => 'required',
                'sched_end_time' => 'required',
                'venue' => 'required',
                'exam_set' => 'required',
            ],
            [
                'sched_date.required' => 'Exam Date field is required',
                'sched_start_time.required' => 'Start Time field is required',
                'sched_end_time.required' => 'End Time field is required',
                'venue.required' => 'Exam Venue field is required',
                'exam_set.required' => 'Exam Set field is required',
            ]

        );
        $create = [
            'exam_set' => $validateData['exam_set'],
            'venue' => $validateData['venue'],
            'start_date' => $validateData['sched_date'].' '.$validateData['sched_start_time'],
            'end_date' => $validateData['sched_date'].' '.$validateData['sched_end_time'],
        ];
        $status = ExamScheduleModel::create($create);

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
        $this->sched_date = '';
        $this->sched_start_time = '';
        $this->sched_end_time = '';
        $this->venue = '';
        $this->exam_set = '';
    }
    public function delete_exam_schedule($id){
        $schedule = new ExamScheduleModel();
        return $schedule->deleteSchedule($id);
    }

    public function update_field($id){
        date_default_timezone_set("Asia/Manila");
        $sched = ExamScheduleModel::where('id', $id)->first();
        $this->update_id = $id;
        $this->update_exam_set = $sched->exam_set;
        $this->update_sched_date = date("Y-m-d", strtotime($sched->start_date));
        $this->update_sched_start_time = date("H:i", strtotime($sched->start_date));
        $this->update_sched_end_time = date("H:i", strtotime($sched->end_date));
        $this->update_venue = $sched->venue;
    }

    public function update_event_schedule(){
        $validateData = $this->validate(
            [
                'update_sched_date' => 'required',
                'update_sched_start_time' => 'required',
                'update_sched_end_time' => 'required',
                'update_venue' => 'required',
                'update_exam_set' => 'required',
            ],
            [
                'update_sched_date.required' => 'Exam Date field is required',
                'update_sched_start_time.required' => 'Exam Start Time field is required',
                'update_sched_end_time.required' => 'Exam End Time field is required',
                'update_venue.required' => 'Exam Venue field is required',
                'update_exam_set.required' => 'Exam Set field is required',
            ]
        );

        $exam_schedule_model = new ExamScheduleModel();
        $status = $exam_schedule_model->updateSchedule($this->update_id, [
            'exam_set' => $this->update_exam_set,
            'venue' => $this->update_venue,
            'start_date' => $validateData['update_sched_date'].' '.$validateData['update_sched_start_time'],
            'end_date' => $validateData['update_sched_date'].' '.$validateData['update_sched_end_time'],
        ]);
        $this->resetUpdateField();
        $this->dispatchBrowserEvent('UpdateSchedule', $status);

    }
}
