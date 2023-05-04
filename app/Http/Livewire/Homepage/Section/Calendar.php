<?php

namespace App\Http\Livewire\Homepage\Section;

use App\Models\Admin\ExamSchedule as ExamScheduleModel;
use Livewire\Component;
use App\Models\CMS\Calendar as CalendarModel;


class Calendar extends Component
{
    public $todayMonth;
    public $todayYear;
    public $toShowEventDetail = [];
    public $event_modal = false;
    public $events = [];

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        $this->todayMonth = date('F');
        $this->todayYear = date('Y');
        $this->toShowEventDetail['id'] = '';
        $this->toShowEventDetail['event_title'] = '';
        $this->toShowEventDetail['start_date'] = '';
        $this->toShowEventDetail['end_date'] = '';
        $this->toShowEventDetail['event'] = '';
        $this->toShowEventDetail['author'] = '';
        $this->toShowEventDetail['venue'] = '';
        $this->toShowEventDetail['category'] = '';
        $this->toShowEventDetail['is_single_day'] = false;
        $this->toShowEventDetail['is_allDay'] = false;
        $this->toShowEventDetail['is_exam_schedule'] = false;
        $this->toShowEventDetail['exam_set'] = '';

    }

    public function render()
    {
        date_default_timezone_set('Asia/Manila');
        $this->events = [];
        $calendars = CalendarModel::where('start_date', '<=', date('Y-m-t 23:59:00'))
                            ->where('end_date', '>=', date('Y-m-01 00:00:00'))
                            ->orderBy('start_date', 'asc')
                            ->get();
        $exams = ExamScheduleModel::where('start_date', '<=', date('Y-m-t 23:59:00'))
                            ->where('end_date', '>=', date('Y-m-01 00:00:00'))
                            ->get();

        foreach ($calendars as $calendar){
            $this->events[] = [
                'id' => $calendar->id,
                'start' => $calendar->start_date,
                'end'   => $calendar->end_date,
                'title' => $calendar->event_title,
                'is_exam_sched' => false,
            ];
        }
        foreach ($exams as $exam){
            $this->events[] = [
                'id' => $exam->id,
                'start' => $exam->start_date,
                'end'   => $exam->end_date,
                'title' => 'ICT Proficiency Exam Schedule',
                'is_exam_sched' => true,
            ];
        }
        return view('livewire.homepage.section.calendar', [
            'toShowEventDetail' => $this->toShowEventDetail
        ]);
    }

    public function showEvent($id, $is_exam_schedule = false){
        if(!$is_exam_schedule){
            $eventModel = new CalendarModel();
            $event = $eventModel->getEvent($id);
            $this->toShowEventDetail['id'] = $event->id;
            $this->toShowEventDetail['event_title'] = $event->event_title;
            $this->toShowEventDetail['start_date'] = $event->start_date;
            $this->toShowEventDetail['end_date'] = $event->end_date;
            $this->toShowEventDetail['event'] = $event->event;
            $this->toShowEventDetail['author'] = $event->author;
            $this->toShowEventDetail['venue'] = $event->venue;
            $this->toShowEventDetail['category'] = $event->category_name;
            $this->toShowEventDetail['is_exam_schedule'] = false;
            if(date('Y-m-d', strtotime($event->start_date)) == date('Y-m-d', strtotime($event->end_date))){
                $this->toShowEventDetail['is_single_day'] = true;
            }else{
                $this->toShowEventDetail['is_single_day'] = false;
            }
            if(date('H:i:s', strtotime($event->start_date)) == '00:00:00' && date('H:i:s', strtotime($event->end_date)) == '23:59:00'){
                $this->toShowEventDetail['is_allDay'] = true;
            }else{
                $this->toShowEventDetail['is_allDay'] = false;
            }
        }else{
            $exam_sched = ExamScheduleModel::where('id', $id)->first();
            $this->toShowEventDetail['id'] = $exam_sched->id;
            $this->toShowEventDetail['event_title'] = 'ICT Proficiency Exam Schedule';
            $this->toShowEventDetail['venue'] = $exam_sched->venue;
            $this->toShowEventDetail['exam_set'] = $exam_sched->exam_set;
            $this->toShowEventDetail['start_date'] = $exam_sched->start_date;
            $this->toShowEventDetail['end_date'] = $exam_sched->end_date;
            $this->toShowEventDetail['is_exam_schedule'] = true;
        }
        $this->event_modal = true;
    }
}
