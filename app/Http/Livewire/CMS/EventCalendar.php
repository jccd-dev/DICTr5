<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Calendar;
use Illuminate\Support\Facades\Validator;
use App\Models\CMS\Calendar as EventCalendarModel;

class EventCalendar extends Component
{
    public $today = [];
    public $createEventArr = [];
    public $events;
    public $search;
    public $toShowEventDetail = [];

    public function render()
    {
        $this->events = Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
        ->select(['calendar.id', 'calendar.event_title as title', 'calendar.start_date as start', 'calendar.end_date as end'])
        ->get();

        return view('livewire.cms.event-calendar', [
                    'events' => $this->events,
                    'thisMonthEvents' => Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                                ->select('calendar.*', 'dict_admins.name')
                                                ->where('start_date', '<=', date('Y-m-t'))
                                                ->where('end_date', '>=', date('Y-m-01'))
                                                ->get(),
                ])
                ->layout('livewire.layout.laravel_layout');
    }

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        $this->today['month'] = date('F');
        $this->today['year'] = date('Y');

        $this->toShowEventDetail['id'] = '';
        $this->toShowEventDetail['event_title'] = '';
        $this->toShowEventDetail['start_date'] = '';
        $this->toShowEventDetail['end_date'] = '';
        $this->toShowEventDetail['event'] = '';
        $this->toShowEventDetail['author'] = '';
        $this->toShowEventDetail['is_single_day'] = false;
        $this->toShowEventDetail['is_allDay'] = false;

    }

    public function create_event(){
        Validator::make($this->createEventArr, [
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ],[
            'event_title.required' => 'Event Title title field is required',
            'start_date.required' => 'Start Date field is required',
            'end_date.required' => 'End Date field is required',
            'start_time.required' => 'Start Time field is required',
            'end_time.required' => 'End Time field is required',
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

    }

    public function resetCreateEventInputs(){
        $this->createEventArr = [];
    }

    public function showEvent($id){
        $eventModel = new EventCalendarModel();
        $event = $eventModel->getEvent($id);
        $this->toShowEventDetail['id'] = $event->id;
        $this->toShowEventDetail['event_title'] = $event->event_title;
        $this->toShowEventDetail['start_date'] = $event->start_date;
        $this->toShowEventDetail['end_date'] = $event->end_date;
        $this->toShowEventDetail['event'] = $event->event;
        $this->toShowEventDetail['author'] = $event->author;
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

    }
}
