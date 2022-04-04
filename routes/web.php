<?php

use App\Events\ComplaintProcessed;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\AudiosController as AdminAudiosController;
use App\Http\Controllers\Admin\BranchesController as AdminBranchesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ComplaintController as AdminComplaintController;
use App\Http\Controllers\Admin\ComplaintLogsController as AdminComplaintLogsController;
use App\Http\Controllers\Admin\EmployeesSectionController;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedbackController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\LibraryController as AdminLibraryController;
use App\Http\Controllers\Admin\FoldersController;
use App\Http\Controllers\Admin\FilesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\MediaFilesController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProgramListsController;
use App\Http\Controllers\Admin\PromotionsController;
use App\Http\Controllers\Admin\VideosController;
use App\Http\Controllers\Admin\FaqController as AdminFaqController;
use App\Http\Controllers\Admin\FaqgroupController;
use App\Http\Controllers\Admin\MediaEventsController as AdminMediaEventsController;
use App\Http\Controllers\Admin\StandardsController as AdminStandardsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\AnticorruptionController;
use App\Http\Controllers\Site\ComplaintController;
use App\Http\Controllers\Site\ContactusController;
use App\Http\Controllers\Site\FaqController;
use App\Http\Controllers\Site\FdgoController;
use App\Http\Controllers\Site\FeedbackController;
use App\Http\Controllers\Site\LawsAndRegulationsController;
use App\Http\Controllers\Site\LibraryController;
use App\Http\Controllers\Site\MediaController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\PagesController;
use App\Http\Controllers\Site\PoliciesController;
use App\Http\Controllers\Site\StandardsController;
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

Route::get('/clear', function () {
	
	/* php artisan migrate */
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    dd("Done");
});

Route::get('/', function () {
    return view('home');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('/library', [LibraryController::class, 'index']);
Route::get('/library/sub_folders_files/{id}', [LibraryController::class, 'sub_folders_files']);
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::resource('/complaint', ComplaintController::class)->only([
    'create','store'
]);
Route::get('/complaint/success/{id}', [ComplaintController::class, 'success']);
Route::resource('/news', NewsController::class);
// Route::resource('/media', MediaController::class);
Route::get('/media', [MediaController::class, 'index']);
Route::get('/media/list/{id}', [MediaController::class, 'list']);
Route::get('/media/videos/{id}', [MediaController::class, 'videos']);
Route::get('/media/videos/{prog_id}/{list_id?}', [MediaController::class, 'videos']);
Route::get('/media/videosByYear/{prog_id}/{year}', [MediaController::class, 'videosByYear'])->name('videosByYear');
Route::get('/media/years/{id}', [MediaController::class, 'years']);
Route::get('/media/files/{id}', [MediaController::class, 'files'])->name('media-files');
Route::get('/media/audios/{id}', [MediaController::class, 'audios']);

Route::resource('/feedback', FeedbackController::class);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/fdgo', [FdgoController::class, 'index']);
Route::get('/anti_corruption', [AnticorruptionController::class, 'index']);
Route::get('/laws_regulations', [LawsAndRegulationsController::class, 'index']);
Route::get('/policies', [PoliciesController::class, 'index']);

Route::get('/mailable', function () {
    $complaint = App\Models\Complaint::find(71);

    return new App\Mail\NewComplaint($complaint);
});

Auth::routes(['verify' => true]);

// Private
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/dashboard', DashboardController::class, [
        'names' => [
            'index' => 'dashboard'
        ]
    ]);
    Route::resource('/complaint', AdminComplaintController::class);
    Route::resource('/news', AdminNewsController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/library', AdminLibraryController::class);
    Route::resource('/folders', FoldersController::class);
    Route::resource('/files', FilesController::class);
    Route::resource('/footer', FooterController::class);
    Route::resource('/header', HeaderController::class);
    Route::resource('/feedback', AdminFeedbackController::class);
    Route::resource('/notifications', NotificationsController::class);
    Route::resource('/employees', EmployeesSectionController::class);
    Route::resource('/promotions', PromotionsController::class);
    Route::resource('/videos', VideosController::class);
    Route::resource('/audios', AdminAudiosController::class);
    Route::resource('/media', AdminMediaController::class)->only([
        'index'
    ]);
    Route::resource('/media_files', MediaFilesController::class);
    Route::resource('/media/lists', ProgramListsController::class);
    Route::resource('/media_events', AdminMediaEventsController::class);
    Route::resource('/faq', AdminFaqController::class);
    Route::resource('/faqgroup', FaqgroupController::class);
    Route::resource('/branches', AdminBranchesController::class)->except([
        'show'
    ]);
    

    Route::prefix('standards/')->group(function () {
        Route::get('', [AdminStandardsController::class, 'index']);
        Route::post('/store_folder', [AdminStandardsController::class, 'storeFolder']);
        Route::put('/update_folder/{id}', [AdminStandardsController::class, 'updateFolder']);
        Route::delete('/destroy_folder/{id}', [AdminStandardsController::class, 'destroyFolder']);
        Route::get('sub_folders_files/{id}', [AdminStandardsController::class, 'sub_folders_files']);
        Route::post('/store_file', [AdminStandardsController::class, 'storeFile']);
        Route::put('/update_file/{id}', [AdminStandardsController::class, 'updateFile']);
        Route::delete('/destroy_file/{id}', [AdminStandardsController::class, 'destroyFile']);
    });
    

    Route::get('/media/sections/{id}', [AdminMediaController::class, 'sections'])->name('media-sections');
    Route::get('/media/list/{id}', [AdminMediaController::class, 'list'])->name('media-list');
    Route::get('/media/list/videos/{id}', [AdminMediaController::class, 'listVideos'])->name('media-list-videos');
    Route::get('/media/videos/{prog_id}/{list_id?}', [AdminMediaController::class, 'videos'])->name('media-videos');
    Route::get('/media/audios/{id}', [AdminMediaController::class, 'audio'])->name('media-audio');
    Route::get('/media/files/{id}', [AdminMediaController::class, 'files'])->name('media-files');
    Route::get('/profile/{profile?}', [ProfileController::class, 'show'])->name('profile');
    Route::get('/download/{dir?}/{file?}', [FilesController::class, 'downloadFile'])->name('download');
    
    Route::resource('/profile', ProfileController::class)->except([
        'show'
    ]);
    
    Route::get('/sub_folders_files/{id}', [AdminLibraryController::class, 'sub_folders_files']);
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

    Route::prefix('logs/')->group(function () {

        Route::get('complaints', [AdminComplaintLogsController::class, 'index'])->name('complaint.logs');
    });

    
});

Route::get('/language', [LanguageController::class, 'setLang'])->name('language');
Route::get('/languageGet', [LanguageController::class, 'getLang'])->name('languageGet');

Route::post('/check', [UsersController::class, 'check'])->name('checkLogin');


Route::get('event', function() {
    event(new ComplaintProcessed('New Complaint'));
});

Route::get('listen', function() {
    return view('listen');
});


Route::resource('standards', StandardsController::class)->only([
    'index'
]);
Route::get('standards/sub_folders_files/{id}', [StandardsController::class, 'sub_folders_files']);
Route::get('contact_us', [ContactusController::class, 'index']);

Route::get('/media_events', [MediaController::class, 'mevents']);

Route::get('/search', function() {

    return view('site.search.index');

});

Route::get('/pages/{page}', [PagesController::class, 'index'])->name('pages');