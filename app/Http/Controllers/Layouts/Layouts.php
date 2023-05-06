<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Models\CMS\HomeBanner;
use App\Models\CMS\POST\PostModel;
use Carbon\Carbon;

class Layouts extends Controller
{
    public HomeBanner $banner_model;
    public PostModel $postModel;
    public function __construct()
    {
        $this->banner_model = new HomeBanner();
        $this->postModel = new PostModel();
    }

    public function render() {
        $banner = $this->banner_model->get();
        $posts = $this->postModel::priority()->get();
        $posts = $posts->map(function ($item) {
            $startedAt = Carbon::parse($item->timestamp);
            $endedAt = Carbon::parse(now());
            $elapsed = $endedAt->diffForHumans($startedAt, ['parts' => 1]);
            $item->elapsed = $elapsed;
            return $item;
        });

        return view('welcome', ['data' => ['banner' => $banner, 'posts' => $posts]]);
    }
}
