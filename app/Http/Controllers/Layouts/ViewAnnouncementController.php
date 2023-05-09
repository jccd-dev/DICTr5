<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Models\CMS\Announcement;
use Illuminate\Http\Request;

class ViewAnnouncementController extends Controller
{
    //
    public function view_announcement(string $id){
        return view('pages.announcement', [
            'announcement' => Announcement::where('id', $id)->first()
        ]);
    }
}
