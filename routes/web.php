<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\AlbumController;
use App\Http\Controllers\backend\AwardController;
use App\Http\Controllers\backend\VideoController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\DownloadController;
use App\Http\Controllers\backend\FacilityController;
use App\Http\Controllers\backend\ContactUsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ObjectiveController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\backend\OurServiceController;
use App\Http\Controllers\backend\PopupModalController;
use App\Http\Controllers\backend\AdminCreateController;
use App\Http\Controllers\backend\ChairpersonController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\IntroductionController;
use App\Http\Controllers\backend\ClassInformationController;
use App\Http\Controllers\backend\OrganizationStructureController;
use App\Http\Controllers\backend\ThakaliHeadController;

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


Route::get('link-storage', function () {
    Artisan::call('storage:link');
    return back();
});


Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {



    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('setting', SettingController::class);
    Route::resource('profile', ProfileController::class);
    Route::post('password-changed', [ProfileController::class, 'passwordChanged'])->name('user.password_changed');

    //Home

    //Popup Modal
    Route::resource('modal', PopupModalController::class)->names('modal');
    Route::get('modal-status', [PopupModalController::class, 'modalStatus'])->name('modal.status');

    //Slider
    Route::resource('slider', SliderController::class);
    Route::get('slider-status', [SliderController::class, 'statusChanged'])->name('slider.status');

    //Award
    Route::resource('award', AwardController::class);
    Route::get('award-status', [AwardController::class, 'statusChanged'])->name('award.status');

    //Team
    Route::resource('team', TeamController::class);
    Route::get('team-status', [TeamController::class, 'statusChanged'])->name('team.status');

    //Notice
    Route::resource('notice', NoticeController::class);
    Route::get('notice-status', [NoticeController::class, 'statusChanged'])->name('notice.status');

    //Testimonial
    Route::resource('testimonial', TestimonialController::class);
    Route::get('testimonial-status', [TestimonialController::class, 'statusChanged'])->name('testimonial.status');

    //Introduction
    Route::resource('introduction', IntroductionController::class);
    Route::get('introduction-status', [IntroductionController::class, 'statusChanged'])->name('introduction.status');

    //Objective
    Route::resource('objective', ObjectiveController::class);
    Route::get('objective-status', [ObjectiveController::class, 'statusChanged'])->name('objective.status');

    //Chairperson
    Route::resource('chairperson', ChairpersonController::class);
    Route::get('chairperson-status', [ChairpersonController::class, 'statusChanged'])->name('chairperson.status');

    //Thakali Head
    Route::resource('thakali', ThakaliHeadController::class);
    Route::get('thakali-status', [ThakaliHeadController::class, 'statusChanged'])->name('thakali.status');

    //Organization Structure
    Route::resource('organization', OrganizationStructureController::class);
    Route::get('organization-status', [OrganizationStructureController::class, 'statusChanged'])->name('organization.status');

    //Blog
    Route::resource('blog', BlogController::class);
    Route::get('blog-status', [BlogController::class, 'statusChanged'])->name('blog.status');


    //Album
    Route::resource('album', AlbumController::class);
    Route::get('album-status', [AlbumController::class, 'statusChanged'])->name('album.status');

    //Video
    Route::resource('video', VideoController::class);
    Route::get('video-status', [VideoController::class, 'statusChanged'])->name('video.status');

    //Facility
    Route::resource('facility', FacilityController::class);
    Route::get('facility-status', [FacilityController::class, 'statusChanged'])->name('facility.status');
    Route::get('ajax-test', [FacilityController::class, 'ajaxTest'])->name('ajax.index');
    Route::get('ajax-specific-data', [FacilityController::class, 'ajaxSpecific'])->name('ajax.get_single_data');


    //Class Information
    Route::resource('class-information', ClassInformationController::class);
    Route::get('class-information-status', [ClassInformationController::class, 'statusChanged'])->name('class_information.status');

    //Download
    Route::resource('download', DownloadController::class);
    Route::get('download-status', [DownloadController::class, 'statusChanged'])->name('download.status');

    //Contact U
    Route::resource('contact', ContactUsController::class);
    Route::get('contact-apply', [ContactUsController::class, 'applyContact'])->name('apply.index');
    Route::get('admission-apply', [ContactUsController::class, 'applyAdmission'])->name('admission.index');
    Route::delete('admission-delete/{id}', [ContactUsController::class, 'deleteAdmission'])->name('admission.delete');



    //Our Services
    Route::resource('service', OurServiceController::class)->except('show');
    Route::get('service-status', [OurServiceController::class, 'statusChanged'])->name('service.status');
    Route::get('service/get-view-data', [OurServiceController::class, 'getViewData'])->name('service.get_view_data');
    Route::get('service/get-edit-data', [OurServiceController::class, 'getEditData'])->name('service.get_edit_data');


    //Upload Other images
    Route::post('upload', [ImageController::class, 'upload'])->name('admin.upload');
    Route::get('delete/{id}', [ImageController::class, 'delete'])->name('admin.delete.image');
});

Route::middleware('auth', 'isSuperAdmin')->group(function () {
    Route::resource('admin-create', AdminCreateController::class);
    Route::get('admin-banned', [AdminCreateController::class, 'adminBanned'])->name('admin_banned');
    Route::get('admin-destroy', [AdminCreateController::class, 'adminDestroy'])->name('admin_destroy');
});

Auth::routes();
