<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Models\CMS\POST\PostModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchResult extends Controller
{

    public function mount(){

        if (!session('visited')) {
            session(['visited' => true]);

            DB::table('visitor_count')->increment('visitors');
        }

        $this->usersCounter['visitor'] = DB::table('visitor_count')->value('visitors');
        $this->usersCounter['applicants'] = DB::table('visitor_count')->value('applicants');
        $this->usersCounter['passers'] = DB::table('visitor_count')->value('passers');

    }
    public function search_result(Request $request){
        $this->mount();
        $this->usersCounter['registered'] = DB::table('users_data')->count();
        $data = [];
        $posts = PostModel::where('title', 'like', '%'.$request->search.'%')
                        ->orWhere('excerpt', 'like', '%'.$request->search.'%')
                        ->orWhere('content', 'like', '%'.$request->search.'%')
                        ->get();
        foreach($posts as $post){
            $data[] = [
              'name' => $post->title,
              'type' => 'post',
              'url' => route('view.post', ['id' => $post->id]),
            ];
        }
        return view('pages.search-result')->with('data', $data)->with('visitors', $this->usersCounter);
    }
}
