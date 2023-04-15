<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Calendar;
use Illuminate\Support\Facades\Validator;

class EventCalendar extends Component
{
    public $today = [];
    public $createEventArr = [];
    public function render()
    {
        return view('livewire.cms.event-calendar', [
                    'events' => Calendar::join('dict_admins', 'calendar.admin_id', '=', 'dict_admins.id')->select('calendar.*', 'dict_admins.name')->get(),
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
    }

    public function create_event(){
        Validator::make($this->createEventArr, [
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ],[
            'event_title.required' => 'Event Title title field is required',
            'start_date.required' => 'Start Date field is required',
            'end_date.required' => 'End Date field is required',
        ])->validate();
    }
}
