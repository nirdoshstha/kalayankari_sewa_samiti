<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\backend\NoticeController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\DownloadController;
use App\Http\Controllers\backend\ContactUsController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ObjectiveController;
use App\Http\Controllers\backend\AdminCreateController;
use App\Http\Controllers\backend\ChairpersonController;
use App\Http\Controllers\backend\ConstitutionRuleController;
use App\Http\Controllers\backend\IntroductionController;
use App\Http\Controllers\backend\OrganizationStructureController;
use App\Http\Controllers\backend\OrganizationStructurePostController;
use App\Http\Controllers\backend\ThakaliHeadController;
use App\Models\OrganizationStructurePost;

Route::get('link-storage', function () {
    Artisan::call('storage:link');
    return back();
});


Route::middleware(['auth', 'isAdmin'])->prefix('admin')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('setting', SettingController::class);
    Route::resource('profile', ProfileController::class);
    Route::post('password-changed', [ProfileController::class, 'passwordChanged'])->name('user.password_changed');

    //Slider
    Route::resource('slider', SliderController::class);
    Route::get('slider-status', [SliderController::class, 'statusChanged'])->name('slider.status');


    //Notice
    Route::resource('notice', NoticeController::class);
    Route::get('notice-status', [NoticeController::class, 'statusChanged'])->name('notice.status');

    //Introduction
    Route::resource('introduction', IntroductionController::class);
    Route::get('introduction-status', [IntroductionController::class, 'statusChanged'])->name('introduction.status');

    //Objective
    Route::resource('objective', ObjectiveController::class);
    Route::get('objective-status', [ObjectiveController::class, 'statusChanged'])->name('objective.status');

    //Constitution & Rule
    Route::resource('constitution', ConstitutionRuleController::class);
    Route::get('constitution-status', [ConstitutionRuleController::class, 'statusChanged'])->name('constitution.status');


    //Chairperson
    Route::resource('chairperson', ChairpersonController::class);
    Route::get('chairperson-status', [ChairpersonController::class, 'statusChanged'])->name('chairperson.status');
    Route::get('chairperson-status-home', [ChairpersonController::class, 'statusChangedHome'])->name('chairperson.status_home');

    //Thakali Head
    Route::resource('thakali', ThakaliHeadController::class);
    Route::get('thakali-status', [ThakaliHeadController::class, 'statusChanged'])->name('thakali.status');
    Route::get('thakali-status-home', [ThakaliHeadController::class, 'statusChangedHome'])->name('thakali.status_home');

    //Organization Structure Category
    Route::resource('organization', OrganizationStructureController::class);
    Route::get('organization-status', [OrganizationStructureController::class, 'statusChanged'])->name('organization.status');

    //Organization Structure Post
    Route::resource('organization_post', OrganizationStructurePostController::class);
    Route::get('organization-post-status', [OrganizationStructurePostController::class, 'statusChanged'])->name('organization_post.status');

    //Download
    Route::resource('download', DownloadController::class);
    Route::get('download-status', [DownloadController::class, 'statusChanged'])->name('download.status');

    //Contact U
    Route::resource('contact', ContactUsController::class);
    Route::get('contact-apply', [ContactUsController::class, 'applyContact'])->name('apply.index');
    Route::get('admission-apply', [ContactUsController::class, 'applyAdmission'])->name('admission.index');
    Route::delete('admission-delete/{id}', [ContactUsController::class, 'deleteAdmission'])->name('admission.delete');

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
