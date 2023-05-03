<?php

namespace App\Http\Controllers\Layouts;

use App\Http\Controllers\Controller;
use App\Models\CMS\HomeBanner;

class Layouts extends Controller
{
    public HomeBanner $banner_model;
    public function __construct()
    {
        $this->banner_model = new HomeBanner();
    }

    public function render() {
        $data = $this->banner_model->get();
        return view('welcome', ['data' => $data]);
    }
}
