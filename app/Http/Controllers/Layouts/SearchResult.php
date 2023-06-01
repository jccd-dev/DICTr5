<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Models\CMS\POST\PostModel;
use Illuminate\Http\Request;

class SearchResult extends Controller
{
    public function search_result(Request $request){
        $data = [];
        $posts = PostModel::where('title', 'like', '%'.$request->search.'%')
                        ->orWhere('excerpt', 'like', '%'.$request->search.'%')
                        ->orWhere('content', 'like', '%'.$request->search.'%')
                        ->get();
        foreach($posts as $post){
            $data[] = [
              'name' => $post->title,
              'type' => 'post',
              'url' => route('view.post').'/'.$post->id,
            ];
        }
    }
}
