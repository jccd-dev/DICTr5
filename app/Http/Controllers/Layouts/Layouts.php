<?php

namespace App\Http\Controllers\Layouts;

use Carbon\Carbon;
use App\Models\VisitorModel;
use App\Models\CMS\HomeBanner;
use App\Models\CMS\POST\PostModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\VisitorController;


class Layouts extends Controller
{
    public HomeBanner $banner_model;
    public PostModel $postModel;
    public $usersCounter = [];

    public function __construct()
    {
        $this->banner_model = new HomeBanner();
        $this->postModel = new PostModel();
    }

    public function mount(){

        if (!session('visited')) {
            session(['visited' => true]);

            DB::table('visitor_count')->increment('visitors');
        }

        $this->usersCounter['visitor'] = DB::table('visitor_count')->value('visitors');

    }

    public function render() {

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

        return view('welcome', ['data' => [
            'banner' => $banner, 'posts' => $posts, 'visitors' => $this->usersCounter]]);
    }
}
