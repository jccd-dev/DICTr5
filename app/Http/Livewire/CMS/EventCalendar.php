<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Calendar;
use Illuminate\Support\Facades\Validator;
use App\Models\CMS\Calendar as EventCalendarModel;
use App\Models\CMS\POST\PostCategory;

class EventCalendar extends Component
{
    public $today = [];
    public $createEventArr = [];
    public $toUpdateId;
    public $updateEventArr = [];
    public $events = [];
    public $search;
    public $toShowEventDetail = [];
    public $rightSideEventList = [];
    public $search_category;

    public function render()
    {
        if($this->search == '' || $this->search == NULL){
            $this->events = Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')
                                ->select(['calendar.id', 'calendar.event_title as title', 'calendar.start_date as start', 'calendar.end_date as end'])
                                ->where('calendar.start_date', '<=', $this->today['last_day_of_month'])
                                ->where('calendar.end_date', '>=', $this->today['first_day_of_month'])
                                ->orderBy('calendar.start_date', 'desc')
                                ->get();
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
                ->layout('livewire.layout.laravel_layout');
    }

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        // $this->today['month'] = date('F');
        // $this->today['year'] = date('Y');
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

        // category
        // $ctgrs = PostCategory::get();
        // foreach($ctgrs as $category)
        //     $this->categories[$category->id] = $category->category;

        $this->createEventArr['category'] = '';
        $this->updateEventArr['category'] = '';

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
            'event_title.required' => 'Event Title title field is required',
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
    }

    public function deleteEvent($id){
        $eventModel = new EventCalendarModel();
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

        $this->dispatchBrowserEvent('UpdatedEvent', $response);
        $this->updateEventArr = [];
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
    }
}
