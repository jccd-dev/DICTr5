<?php

namespace App\Http\Livewire\Cms;

use Livewire\Component;
use App\Models\CMS\Calendar;

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
                ->layout('livewire.layout.laravel_layout');;
    }

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        $this->today['month'] = date('F');
        $this->today['year'] = date('Y');
    }
}
