<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Livewire\CMS\SliderBanner;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\CMS\Announcements;
use App\Http\Livewire\CMS\EventCalendar;
>>>>>>> 790fb20152c2c56c1e6d6b1749c666499f0e54f6
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

