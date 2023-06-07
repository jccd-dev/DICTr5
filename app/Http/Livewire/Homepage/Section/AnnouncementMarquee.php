<?php

namespace App\Http\Livewire\Homepage\Section;

use App\Models\CMS\Announcement;
use Livewire\Component;

class AnnouncementMarquee extends Component
{
    public $announcements;
    public function render()
    {
        return view('livewire.homepage.section.announcement-marquee');
    }

    public function mount(){
        date_default_timezone_set('Asia/Manila');
        $this->announcements = Announcement::where('status', 1)
                                        ->where('start_duration', '<=', date('Y-m-d H:i:s'))
                                        ->where('end_duration', '>=', date('Y-m-d H:i:s'))
                                        ->take(3)
                                        ->get();
    }

    public function redirect_announcement(){
//        return redirect()->route('view.announcement', ['id' => $id]);
        return redirect()->route('view.announcement');
    }
}
