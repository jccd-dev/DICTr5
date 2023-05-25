<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Calendar;
use App\Helpers\AdminLogActivity;
use App\Models\CMS\POST\PostCategory;
use Illuminate\Support\Facades\Validator;
use App\Models\CMS\Calendar as EventCalendarModel;
use App\Models\Admin\ExamSchedule as ExamScheduleModel;

class EventCalendar extends Component
{
    public $today = [];
    public $createEventArr = [];
    public $toUpdateId;
    public $updateEventArr = [];
    // For Calendar
    public $events = [];
    // For Exam Schedule
    public $examSchedules = [];
    public $calendar_events = [];
    public $search;
    public $toShowEventDetail = [];
    public $rightSideEventList = [];
    public $search_category;
    public $forExamSchedule = false;

    //Exam Schedule
    public $examSched = [];
    public function render()
    {
        $this->events = [];
        if($this->search == '' || $this->search == NULL){
            $calendars = Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                ->select(['calendar.id', 'calendar.event_title as title', 'calendar.start_date as start', 'calendar.end_date as end'])
                                ->where('calendar.start_date', '<=', $this->today['last_day_of_month'])
                                ->where('calendar.end_date', '>=', $this->today['first_day_of_month'])
                                ->orderBy('calendar.start_date', 'desc')
                                ->get();
            $exams = ExamScheduleModel::where('start_date', '<=', $this->today['last_day_of_month'])
                                ->where('end_date', '>=', $this->today['first_day_of_month'])
                                ->get();
            foreach ($calendars as $calendar){
                $this->events[] = [
                    'id' => $calendar->id,
                    'start' => $calendar->start,
                    'end'   => $calendar->end,
                    'title' => $calendar->title
                ];
            }
            foreach ($exams as $exam){
                $this->events[] = [
                    'id' => 'examschedule',
                    'start' => $exam->start_date,
                    'end'   => $exam->end_date,
                    'title' => 'ICT Proficiency Exam Schedule'
                ];
            }
        }else{
            $this->events = Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                ->join('post_categories', 'calendar.category', '=', 'post_categories.id')
                                ->select(['calendar.id', 'calendar.event_title as title', 'calendar.start_date as start', 'calendar.end_date as end'])
                                ->where('calendar.event_title', 'like', '%'.$this->search.'%')
                                ->orWhere('post_categories.category', 'like', '%'.$this->search.'%')
                                ->orWhere('calendar.venue', 'like', '%'.$this->search.'%')
                                ->get();
        }
        return view('livewire.cms.event-calendar')
                ->layout('layouts.layout');
    }

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        $this->today['first_day_of_month'] = date('Y-m-01 00:00:00');
        $this->today['last_day_of_month'] = date('Y-m-t 23:59:00');

        $this->toShowEventDetail['id'] = '';
        $this->toShowEventDetail['event_title'] = '';
        $this->toShowEventDetail['start_date'] = '';
        $this->toShowEventDetail['end_date'] = '';
        $this->toShowEventDetail['event'] = '';
        $this->toShowEventDetail['author'] = '';
        $this->toShowEventDetail['category'] = '';
        $this->toShowEventDetail['venue'] = '';
        $this->toShowEventDetail['is_single_day'] = false;
        $this->toShowEventDetail['is_allDay'] = false;

        $this->createEventArr['category'] = '';
        $this->updateEventArr['category'] = '';

        $this->examSched['date'] = '';
        $this->examSched['start_time'] = '09:00';
        $this->examSched['end_time'] = '12:00';

        // Events to display in Calendar
        $list = Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                ->select(['calendar.id', 'calendar.event_title as title', 'calendar.start_date as start', 'calendar.end_date as end'])
                                ->where('calendar.start_date', '<=', $this->today['last_day_of_month'])
                                ->where('calendar.end_date', '>=', $this->today['first_day_of_month'])
                                ->orderBy('calendar.start_date', 'desc')
                                ->get();
        foreach ($list as $l){
            $this->calendar_events[] = [
                'id' => $l->id,
                'title' => $l->title,
                'start' => $l->start,
                'end' => $l->end,
                'color' => '#00296B'
            ];
        }
        $exams = ExamScheduleModel::all();
        foreach($exams as $exam){
            $this->calendar_events[] = [
                'id' => 'examschedule',
                'title' => 'EXAM SCHEDULE',
                'start' => $exam->start_date,
                'end' => $exam->end_date,
                'color' => '#989898',
            ];
        }

    }

    public function create_event(){
        Validator::make($this->createEventArr, [
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required',
            'category' => 'required',
        ],[
            'event_title.required' => 'Event Title field is required',
            'start_date.required' => 'Start Date field is required',
            'end_date.required' => 'End Date field is required',
            'start_time.required' => 'Start Time field is required',
            'end_time.required' => 'End Time field is required',
            'venue.required' => 'Venue field is required',
            'category.required' => 'Category field is required',
        ])->validate();

        // Combine Date and Time
        $this->createEventArr['start_date'] .= ' '.$this->createEventArr['start_time'];
        $this->createEventArr['end_date'] .= ' '.$this->createEventArr['end_time'];

        // Removing Time in Array
        unset($this->createEventArr['start_time']);
        unset($this->createEventArr['end_time']);

        // TODO: get the admin
        $this->createEventArr['admin_id'] = 1;

        $eventModel = new EventCalendarModel();

        $id = $eventModel->createEvent($this->createEventArr);
        $eventDetail = $eventModel->getEvent($id);
        // data to be displayed in calendar
        $eventCreated = [
            'status' => ($id) ? true : false,
            'event' => [
                'id' => $id,
                'title' => $eventDetail->event_title,
                'start' => $eventDetail->start_date,
                'end' => $eventDetail->end_date,

            ],
        ];
        $this->dispatchBrowserEvent('EventCreated', $eventCreated);

        $this->resetCreateEventInputs();

        AdminLogActivity::addToLog("created an event", session()->get('admin_id'));
    }

    public function resetCreateEventInputs(){
        $this->createEventArr = [];
    }

    public function showEvent($id){
        if($id != 'examschedule'){
            $eventModel = new EventCalendarModel();
            $event = $eventModel->getEvent($id);
            $this->toShowEventDetail['id'] = $event->id;
            $this->toShowEventDetail['event_title'] = $event->event_title;
            $this->toShowEventDetail['start_date'] = $event->start_date;
            $this->toShowEventDetail['end_date'] = $event->end_date;
            $this->toShowEventDetail['event'] = $event->event;
            $this->toShowEventDetail['author'] = $event->author;
            $this->toShowEventDetail['venue'] = $event->venue;
            $this->toShowEventDetail['category'] = $event->category_name;
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
            $this->show_event_modal = true;
        }else{
            $this->dispatchBrowserEvent('ErrorForExamSchedule', true);
        }
    }

    public function deleteEvent($id){
        $eventModel = new EventCalendarModel();
        AdminLogActivity::addToLog("deleted an event", session()->get('admin_id'));
        return $eventModel->deleteEvent($id);
    }

    public function update_event_data($id){
        $eventModel = new EventCalendarModel();
        $event = $eventModel->getEvent($id);
        $this->toUpdateId = $event->id;
        $this->updateEventArr['event_title'] = $event->event_title;
        $this->updateEventArr['start_date'] = date('Y-m-d', strtotime($event->start_date));
        $this->updateEventArr['end_date'] = date('Y-m-d', strtotime($event->end_date));
        $this->updateEventArr['start_time'] = date('H:i:s', strtotime($event->start_date));
        $this->updateEventArr['end_time'] = date('H:i:s', strtotime($event->end_date));
        $this->updateEventArr['venue'] = $event->venue;
        $this->updateEventArr['category'] = $event->category;
        $this->dispatchBrowserEvent('update_event_content', $event->event);
        $this->show_event_modal = false;
        $this->update_event_modal = true;
    }

    public function update_event(){
        Validator::make($this->updateEventArr, [
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required',
            'category' => 'required',
        ],[
            'event_title.required' => 'Event Title title field is required',
            'start_date.required' => 'Start Date field is required',
            'end_date.required' => 'End Date field is required',
            'start_time.required' => 'Start Time field is required',
            'end_time.required' => 'End Time field is required',
            'venue.required' => 'Venue field is required',
            'category.required' => 'Category field is required',
        ])->validate();

        // Combine Date and Time
        $this->updateEventArr['start_date'] .= ' '.$this->updateEventArr['start_time'];
        $this->updateEventArr['end_date'] .= ' '.$this->updateEventArr['end_time'];

        // Removing Time in Array
        unset($this->updateEventArr['start_time']);
        unset($this->updateEventArr['end_time']);

        // TODO: get the admin
        $this->updateEventArr['admin_id'] = 1;

        $eventModel = new EventCalendarModel();
        $status = $eventModel->updateEvent($this->toUpdateId, $this->updateEventArr);
        $event = $eventModel->getEvent($this->toUpdateId);
        $response = [
            'status' => $status,
            'event' => [
                'id' => $event->id,
                'event_title' => $event->event_title,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ]
        ];
        $this->update_event_modal = false;
        $this->dispatchBrowserEvent('UpdatedEvent', $response);
        $this->updateEventArr = [];
        AdminLogActivity::addToLog("updated an event", session()->get('admin_id'));
    }

    public function updateMonthAndYear($date){
        $this->today['first_day_of_month'] = $date;
        $this->today['last_day_of_month'] = date('Y-m-t 23:59:00', strtotime($date));
    }

    public function reschedule($id, $start, $end){
        $updateEvent = Calendar::find($id);
        $updateEvent->start_date = $start;
        $updateEvent->end_date = $end;
        $updateEvent->save();
    }

    public function create_category($category){
        $created_category = PostCategory::create([
                    'category' => $category
                ]);
        $this->createEventArr['category'] = $created_category->id;
        $this->updateEventArr['category'] = $created_category->id;
        AdminLogActivity::addToLog("created a category", session()->get('admin_id'));
    }

    public $create_event_modal = false;
    public $update_event_modal = false;
    public $show_event_modal = false;
    public function showModal($id, $show){
        if($id == "create_event_modal"){
            $this->create_event_modal = true;
        }
    }

    public function selectVenue($venue){
        $this->examSched['venue'] = $venue;
    }

    public function create_exam_schedule(){
        $validator = Validator::make($this->examSched, [
            'exam_set' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'venue' => 'required',
        ],[
            'exam_set.required' => 'Exam Set field is required',
            'date.required' => 'Event Date field is required',
            'start_time.required' => 'Staring Time field is required',
            'end_time.required' => 'End Time field is required',
            'venue.required' => 'Exam Venue field is required',
        ]);

        if ($validator->fails()) {
            $this->addError('examSched.exam_set', $validator->errors()->first('exam_set'));
            $this->addError('examSched.date', $validator->errors()->first('date'));
            $this->addError('examSched.start_time', $validator->errors()->first('start_time'));
            $this->addError('examSched.end_time', $validator->errors()->first('end_time'));
            $this->addError('examSched.venue', $validator->errors()->first('venue'));
        }else{
            $create = [
                'exam_set' => $this->examSched['exam_set'],
                'venue' => $this->examSched['venue'],
                'start_date' => $this->examSched['date'].' '.$this->examSched['start_time'],
                'end_date' => $this->examSched['date'].' '.$this->examSched['end_time'],
            ];
            $status = ExamScheduleModel::create($create);

            $this->resetExamSchedForm();
            $this->dispatchBrowserEvent('ExamScheduleCreated', $status);
        }

        AdminLogActivity::addToLog("created exam schedule", session()->get('admin_id'));
    }

    public function resetExamSchedForm(){
        $this->examSched['exam_set'] = '';
        $this->examSched['date'] = '';
        $this->examSched['venue'] = '';
    }

}
