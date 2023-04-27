<?php

namespace App\Http\Livewire\Homepage\Section;

use Livewire\Component;
use App\Models\CMS\Calendar as CalendarModel;


class Calendar extends Component
{
    public $todayMonth;
    public $todayYear;
    public $toShowEventDetail = [];

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
        $this->toShowEventDetail['is_single_day'] = false;
        $this->toShowEventDetail['is_allDay'] = false;

    }

    public function render()
    {
        return view('livewire.homepage.section.calendar', [
            'events' => CalendarModel::where('start_date', '<=', date('Y-m-t 23:59:00'))->where('end_date', '>=', date('Y-m-01 00:00:00'))->orderBy('start_date', 'asc')->get(),
            'toShowEventDetail' => $this->toShowEventDetail
        ]);
    }

    public function showEvent($id){
        $eventModel = new CalendarModel();
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
        // dd($this->toShowEventDetail);
    }
}
