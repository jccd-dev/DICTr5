<?php

namespace App\Http\Controllers\Layouts;

use Illuminate\Http\Request;
use App\Models\CMS\Announcement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ViewAnnouncementController extends Controller
{

    public $usersCounter = [];
    public function mount(){

        if (!session('visited')) {
            session(['visited' => true]);

            DB::table('visitor_count')->increment('visitors');
        }

        $this->usersCounter['visitor'] = DB::table('visitor_count')->value('visitors');
        $this->usersCounter['applicants'] = DB::table('visitor_count')->value('applicants');
        $this->usersCounter['passers'] = DB::table('visitor_count')->value('passers');

    }
    //
    public function view_announcement(string $id){
        $this->mount();
        $this->usersCounter['registered'] = DB::table('users_data')->count();
        return view('pages.announcement', [
            'announcement' => Announcement::where('id', $id)->first(),
            'visitors'     => $this->usersCounter
        ]);
    }
}
