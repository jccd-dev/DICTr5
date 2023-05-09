<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Examinee\GoogleAuthController;
use App\Http\Controllers\Admins\AdminLoginController;
use App\Http\Livewire\CMS\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CMS\SliderBanner;
use App\Http\Livewire\ContactForm;
use App\Http\Livewire\CMS\Announcements;
use App\Http\Livewire\CMS\EventCalendar;
use App\Http\Livewire\CMS\Posts;
use App\Http\Livewire\Admin\ExamSchedule;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Admin\Dashboard;
use App\Http\Livewire\User;
use App\Http\Livewire\CMS\Slider;
use App\Http\Controllers\Layouts\ViewAnnouncementController;
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

Route::get('/', [\App\Http\Controllers\Layouts\Layouts::class, 'render']);
Route::get("/posts", [\App\View\Components\Pages\Posts::class, 'render']);
Route::get('/testing', \App\Http\Livewire\CMS\Testing::class);


// STATIC PAGES ROUTES
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/announcement/{id}',[ViewAnnouncementController::class, 'view_announcement'])->name('view.announcement');

// ADMIN SIDE ROUTES
Route::prefix('admin')->group(function () {

    Route::get('/login', Login::class)->name("admin.login")->middleware(['jwt.isLoggedIn']);
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name("admin.logout");

    Route::middleware(['jwt.logAuth'])->group(function (){
        Route::get('/dashboard', Dashboard::class)->name("admin.dashboard");
        Route::get('/test', [AdminLoginController::class, 'test'])->name("admin.test");

        Route::prefix('cms')->group(function () {
            Route::get('/slider', Slider::class)->name("admin.cms.slider");
            Route::get('/posts', Posts::class)->name('admin.cms.posts'); // Post::class
            Route::get('/category', \App\Http\Livewire\CMS\Category::class)->name('admin.cms.category'); // Post::class
            Route::get('/announcement', Announcements::class)->name('admin.cms.announcement');
            Route::get('/event-calendar', EventCalendar::class)->name('admin.cms.calendar');
        });

        Route::get('/exam-schedule', ExamSchedule::class)->name('admin.exam-schedule');
        Route::get('/inbox', CMSInbox::class)->name('admin.inbox');
    });
});

// USER SIDE ROUTES
Route::prefix('user')->middleware(['userAuth'])->group(function () {
    Route::get('/dashboard', User\Dashboard::class)->name('user.dashboard');
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

Route::get('/logout', function () {
    session()->flush();
});

//testing for JWT middleware
//Route::middleware(['jwt.logAuth', 'jwt.roleCheck:superadmin,normaladmin'])->group(function () {
//    Route::get('/posts', Posts::class)->name('admin.cms.posts');
//});


// For API
Route::prefix('api')->group(function () {
    Route::match(['GET', 'POST'], '/request/category', [ApiController::class, 'request_category'])->name('api.request.category');
});
