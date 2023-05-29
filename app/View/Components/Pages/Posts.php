<?php

namespace App\View\Components\Pages;

use Carbon\Carbon;
use App\Models\VisitorModel;
use App\Models\CMS\HomeBanner;
use App\Models\CMS\POST\PostModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Posts extends Component
{
    public HomeBanner $banner_model;
    public PostModel $postModel;
    public $usersCounter = [];
    public $data = [];

    public function __construct($id)
    {
        $this->banner_model = new HomeBanner();
        $this->postModel = new PostModel();
        $this->data = PostModel::where('id', $id)->first();
    }

    public function mount()
    {
        if (!session('visited')) {
            session(['visited' => true]);

            DB::table('visitor_count')->increment('visitors');
        }

        $this->usersCounter['visitor'] = DB::table('visitor_count')->value('visitors');
        $this->usersCounter['applicants'] = DB::table('visitor_count')->value('applicants');
        $this->usersCounter['passers'] = DB::table('visitor_count')->value('passers');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->mount();
        $this->usersCounter['registered'] = DB::table('users_data')->count();
        $banner = $this->banner_model->get();
        $posts = $this->postModel::priority()->get();
        $posts = $posts->map(function ($item) {
            $startedAt = Carbon::parse($item->timestamp);
            $endedAt = Carbon::parse(now());
            $elapsed = $endedAt->diffForHumans($startedAt, ['parts' => 1]);
            $item->elapsed = $elapsed;
            return $item;
        });
        return view('components.pages.posts', ['data' => [
            'banner' => $banner, 'posts' => $posts, 'visitors' => $this->usersCounter, 'cur_post' => $this->data
        ]])->layout('layouts.static-layout');
    }
}
