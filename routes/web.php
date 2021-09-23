<?php

use App\Events\ComplaintProcessed;
use App\Http\Controllers\admin\AudiosController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ComplaintController;
use App\Http\Controllers\admin\EmployeesSectionController;
use App\Http\Controllers\admin\FeedbackController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\LibraryController;
use App\Http\Controllers\admin\FoldersController;
use App\Http\Controllers\admin\FilesController;
use App\Http\Controllers\admin\FooterController;
use App\Http\Controllers\admin\HeaderController;
use App\Http\Controllers\admin\MediaController;
use App\Http\Controllers\admin\MediaFilesController;
use App\Http\Controllers\admin\NotificationsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\admin\ProgramListsController;
use App\Http\Controllers\admin\PromotionsController;
use App\Http\Controllers\admin\VideosController;
use App\Http\Controllers\admin\FaqController;
use App\Http\Controllers\admin\FaqgroupController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Gate;
use App\Models\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public
Route::group(['page' => '{page}'], function() {

    Route::get('/', function () {
        return view('home');
    });

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    Route::resource('/complaint', App\Http\Controllers\ComplaintController::class);
    Route::resource('/news', App\Http\Controllers\NewsController::class);
    Route::resource('/media', App\Http\Controllers\MediaController::class);
    Route::get('/media/list/{id}', [App\Http\Controllers\MediaController::class, 'list']);
    Route::get('/media/videos/{id}', [App\Http\Controllers\MediaController::class, 'videos']);
    Route::get('/media/videos/{prog_id}/{list_id?}', [App\Http\Controllers\MediaController::class, 'videos']);
    Route::get('/media/videosByYear/{prog_id}/{year}', [App\Http\Controllers\MediaController::class, 'videosByYear'])->name('videosByYear');
    Route::get('/media/years/{id}', [App\Http\Controllers\MediaController::class, 'years']);
    Route::get('/media/files/{id}', [App\Http\Controllers\MediaController::class, 'files'])->name('media-files');
    Route::resource('/feedback', App\Http\Controllers\FeedbackController::class);

    Route::get('/pages/{page}', [App\Http\Controllers\PagesController::class, 'index']);
    Route::get('/pages/{page}/{folder}', [App\Http\Controllers\PagesController::class, 'pageWithFiles']);

    Auth::routes(['verify' => true]);
});

// Private
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/dashboard', DashboardController::class, [
        'names' => [
            'index' => 'dashboard'
        ]
    ]);
    Route::resource('/complaint', ComplaintController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/library', LibraryController::class);
    Route::resource('/folders', FoldersController::class);
    Route::resource('/files', FilesController::class);
    Route::resource('/footer', FooterController::class);
    Route::resource('/header', HeaderController::class);
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/notifications', NotificationsController::class);
    Route::resource('/employees', EmployeesSectionController::class);
    Route::resource('/promotions', PromotionsController::class);
    Route::resource('/videos', VideosController::class);
    Route::resource('/audios', AudiosController::class);
    Route::resource('/media', MediaController::class);
    Route::resource('/media_files', MediaFilesController::class);
    Route::resource('/media/lists', ProgramListsController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/faqgroup', FaqgroupController::class);

    Route::get('/media/sections/{id}', [MediaController::class, 'sections'])->name('media-sections');
    Route::get('/media/list/{id}', [MediaController::class, 'list'])->name('media-list');
    Route::get('/media/list/videos/{id}', [MediaController::class, 'listVideos'])->name('media-list-videos');
    Route::get('/media/videos/{prog_id}/{list_id?}', [MediaController::class, 'videos'])->name('media-videos');
    Route::get('/media/audios/{id}', [MediaController::class, 'audio'])->name('media-audio');
    Route::get('/media/files/{id}', [MediaController::class, 'files'])->name('media-files');
    Route::get('/profile/{profile?}', [ProfileController::class, 'show'])->name('profile');
    Route::get('/download/{dir?}/{file?}', [FilesController::class, 'downloadFile'])->name('download');
    
    Route::resource('/profile', ProfileController::class)->except([
        'show'
    ]);
    
    // data
    Route::get('/complaint_data', [App\Http\Controllers\admin\ComplaintController::class, 'fetch_data']);
    Route::get('/users_data', [App\Http\Controllers\admin\UsersController::class, 'fetch_data']);
    Route::get('/news_data', [App\Http\Controllers\admin\NewsController::class, 'fetch_data']);
    Route::get('/promotion_data', [App\Http\Controllers\admin\PromotionsController::class, 'fetch_data']);
    Route::get('/sub_folders_files/{id}', [LibraryController::class, 'sub_folders_files']);
    Route::get('/footerLinks/{id?}', [FooterController::class, 'footerLinks'])->name('footer_links');
    Route::get('/headerSublinks/{id?}', [HeaderController::class, 'headerSublinks'])->name('header_links');

    // ajax 
    Route::post('/addHeaderLink', [HeaderController::class, 'addHeaderLink']);
    Route::post('/updateHeaderLinks/{id}', [HeaderController::class, 'updateHeaderLinks']);
    Route::post('/updateHeaderSublinks/{id}', [HeaderController::class, 'updateHeaderSublinks']);
    Route::post('/deleteHeaderLink/{id}', [HeaderController::class, 'deleteHeaderLink']);
    Route::post('/deleteHeaderSublink/{id}', [HeaderController::class, 'deleteHeaderSublink']);

    Route::post('/addFooterLink', [FooterController::class, 'addFooterLink']);
    Route::post('/updateFooterLinks/{id}', [FooterController::class, 'updateFooterLinks']);
    Route::post('/updateFooterSublinks/{id}', [FooterController::class, 'updateFooterSublinks']);
    Route::post('/deleteFooterLink/{id}', [FooterController::class, 'deleteFooterLink']);
    Route::post('/deleteFooterSublink/{id}', [FooterController::class, 'deleteFooterSublink']);

    Route::get('/settings', function () {
        
        $group = Group::find(Auth::user()->group_id);

        if (Gate::denies('group-admin', $group)) {

            abort(403);
        }

        return view('admin.settings.index');
    })->name('settings');

    
});

// Route::get('/download/{file}', [ComplaintController::class, 'downloadFile'])->name('download');
Route::get('/language', [LanguageController::class, 'setLang'])->name('language');
Route::get('/languageGet', [LanguageController::class, 'getLang'])->name('languageGet');

Route::post('/check', [App\Http\Controllers\admin\UsersController::class, 'check'])->name('checkLogin');


Route::get('event', function() {
    event(new ComplaintProcessed('New Complaint'));
});

Route::get('listen', function() {
    return view('listen');
});