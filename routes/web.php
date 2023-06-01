<?php

use App\Http\Controllers\Admins\AdminAccounts;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Examinee\GoogleAuthController;
use App\Http\Controllers\Admins\AdminLoginController;
use App\Http\Controllers\Admins\AdminLogsController;
use App\Http\Controllers\VisitorController;
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
use App\Http\Controllers\Admins\Examinee\ManageApplicants;
use App\Http\Controllers\Admins\SystemLogs;
use \App\Http\Controllers\UserDataController;
use \App\View\Components\Pages\Posts as PostsView;
use \App\Http\Controllers\Layouts\SearchResult;

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

Route::get('/', [\App\Http\Controllers\Layouts\Layouts::class, 'render'])->name('homepage');
Route::get("/posts/{id}", function ($id) {
    $component = new PostsView($id);

    return $component->render();
})->name('view.post');
Route::get('/testing', \App\Http\Livewire\CMS\Testing::class);
Route::get('/mandate-powers-and-functions', function () {
    return view('static.mandate-powers-and-functions');
});
Route::get('/mission-vision', function () {
    return view('static.mission-vision');
});
Route::get('/ra-10844', function () {
    return view('static.ra-10844');
});
Route::get('/dict-cam-sur-officials', function () {
    return view('static.officials');
});
Route::get('/agency', function () {
    return view('static.agency');
});


// STATIC PAGES ROUTES
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/announcement/', [ViewAnnouncementController::class, 'view_announcement'])->name('view.announcement');

Route::get('/announcement/{id}', [ViewAnnouncementController::class, 'view_announcement_by_id'])->name('view.announcement-by-id');

Route::get('/search_result', [SearchResult::class, 'search_result'])->name('view.search_result');

// ADMIN SIDE ROUTES
Route::prefix('admin')->group(function () {

    Route::get('/login', Login::class)->name("admin.login")->middleware(['jwt.isLoggedIn']);
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name("admin.logout");

    Route::middleware(['jwt.logAuth'])->group(function () {
        Route::get('/dashboard', Dashboard::class)->name("admin.dashboard");
        Route::get('/test', [AdminLoginController::class, 'test'])->name("admin.test");

        // content management system routes
        Route::prefix('cms')->group(function () {
            Route::get('/slider', Slider::class)->name("admin.cms.slider");
            Route::get('/posts', Posts::class)->name('admin.cms.posts'); // Post::class
            Route::get('/category', \App\Http\Livewire\CMS\Category::class)->name('admin.cms.category'); // Post::class
            Route::get('/announcement', Announcements::class)->name('admin.cms.announcement');
            Route::get('/event-calendar', EventCalendar::class)->name('admin.cms.calendar');
        });

        // manage admin accounts
        Route::prefix('dict-admins')->middleware(['jwt.roleCheck:100'])->group(function () {
            Route::get('/', [AdminAccounts::class, 'render'])->name('admin.accounts');
            Route::post('/create', [AdminAccounts::class, 'add_admin'])->name('admin.create');
            Route::get('/view/{id}', [AdminAccounts::class, 'access_admin'])->name('admin.access');
            Route::get('/update/{id}', [AdminAccounts::class, 'update_admin'])->name('admin.update');
            Route::delete('/delete/{id}', [AdminAccounts::class, 'delete_admin'])->name('admin.delete');
        });

        Route::prefix('examinee')->middleware(['jwt.roleCheck:100,200'])->group(function () {
            Route::get('/', [ManageApplicants::class, 'render'])->name('admin.examinees');
            Route::get('/search', [ManageApplicants::class, 'search_examinees'])->name('search');
            Route::get('/{id}', [ManageApplicants::class, 'select_examinee'])->name('examinee.get');
            Route::post('/add-examinee', [ManageApplicants::class, 'add_user'])->name('examinee.add');
            // Route::get('/q/{id}', [ManageApplicants::class, 'examinee'])->name('examinee.q');
            Route::post('/{id}/update-examinee', [ManageApplicants::class, 'update_users_data'])->name('examinee.update');
            Route::post('/{id}/validation', [ManageApplicants::class, 'validate_application'])->name('examinee.validate');
            Route::post('/{id}/send-result/', [ManageApplicants::class, 'send_exam_result'])->name('examinee.result');
            Route::get('/{id}/deactivate', [ManageApplicants::class, 'deactivate_account'])->name('examinee.deactivate');

            //manually apply the applicant
            Route::get('/{id}/apply-examinee', [ManageApplicants::class, 'apply_examinee'])->name('examinee.apply');
        });

        Route::middleware(['jwt.roleCheck:100,200'])->group(function () {
            Route::get('/exam-schedule', ExamSchedule::class)->name('admin.exam-schedule');
            Route::get('/exam-schedule/{id}', ExamSchedule::class)->name('admin.exam-schedule2');
            Route::get('/inbox', CMSInbox::class)->name('admin.inbox');
            Route::get('/logs', [AdminLogsController::class, 'render'])->name('admin.system-log');
            Route::get('/clean-logs', [AdminLogsController::class, 'clean_logs'])->name('admin.clean-logs');
        });
    });
});

// USER SIDE ROUTES
Route::prefix('user')->group(function () {
    Route::get('/login', [GoogleAuthController::class, 'user_login'])->name('user.login');
    Route::get('/dashboard', User\Dashboard::class)->name('user.dashboard')->middleware(['user.logAuth']);
    Route::get('/generate_pdf', [UserDataController::class, 'generateILCDBForm'])->name('user.generate_pdf');
});

// Google OAuth
Route::prefix('auth')->group(function () {
    Route::get('/redirect', [GoogleAuthController::class, 'redirect'])->name('redirect.google');
    Route::get('/google/callback-url', [GoogleAuthController::class, 'callback']);
});

// Diagnostic Exam
// For Testing
Route::prefix('exam')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('examinee.dashboard')->middleware(['user.logAuth']);
    Route::get('/send-email', [UserDashboardController::class, 'sendEmail']);
});

Route::get('/user/logout', function () {
    session()->flush();
    return redirect()->route('homepage');
})->name('user.logout');

//Visitor Counter
Route::get('/visitor-counts', [VisitorController::class, 'incrementVisitor']);

//testing for JWT middleware
//Route::middleware(['jwt.logAuth', 'jwt.roleCheck:superadmin,normaladmin'])->group(function () {
//    Route::get('/posts', Posts::class)->name('admin.cms.posts');
//});


// For API
Route::prefix('api')->group(function () {
    Route::match(['GET', 'POST'], '/request/category', [ApiController::class, 'request_category'])->name('api.request.category');
});
