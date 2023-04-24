<?php

use App\Http\Controllers\Examinee\GoogleAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CMS\SliderBanner;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\CMS\Announcements;
use App\Http\Livewire\CMS\EventCalendar;
use App\Http\Livewire\CMS\Posts;
use App\Http\Livewire\Admin\ExamSchedule;
use App\Http\Controllers\Examinee\DashboardController as UserDashboardController;
use App\Http\Livewire\Admin\Inbox as CMSInbox;

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
Route::get('/testing', \App\Http\Livewire\CMS\Testing::class);

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
        Route::get('/posts', Posts::class)->name('admin.cms.posts'); // Post::class
        Route::get('/announcement', Announcements::class)->name('admin.cms.announcement');
        Route::get('/event-calendar', EventCalendar::class)->name('admin.cms.calendar');
    });
    Route::get('/exam-schedule', ExamSchedule::class)->name('admin.exam-schedule');
    Route::get('/inbox', CMSInbox::class)->name('admin.inbox');
});

// Google OAuth
Route::prefix('auth')->group(function () {
    Route::get('/redirect', [GoogleAuthController::class, 'redirect'])->name('redirect.google');
    Route::get('/google/callback-url', [GoogleAuthController::class, 'callback']);
});

// Diagnostic Exam
Route::prefix('exam')->group(function () {
    Route::get('/login', [GoogleAuthController::class, 'user_login']);
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('examinee.dashboard');
    Route::get('/send-email', [UserDashboardController::class, 'sendEmail']);
});

Route::get('/logout', function(){
    session()->flush();
});
