<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CMS\SliderBanner;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\CMS\Announcements;
use App\Http\Livewire\CMS\EventCalendar;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//TODO: cant display the slider form component
//FIXME: blank page
Route::get('/form', function() {
    return view('layouts.app');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::prefix('admin')->group(function () {
    Route::prefix('cms')->group(function (){
        Route::get('/announcement', Announcements::class)->name('admin.cms.announcement');
        Route::get('/event-calendar', EventCalendar::class)->name('admin.cms.calendar');
    });
});

