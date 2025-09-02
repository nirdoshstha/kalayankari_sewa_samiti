<?php

use App\Http\Controllers\frontend\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/introduction', [FrontendController::class, 'introduction'])->name('frontend.introduction');
Route::get('/organization-structure', [FrontendController::class, 'organizationStructure'])->name('frontend.organization');
Route::get('notice-modal-view', [FrontendController::class, 'noticeModalView'])->name('frontend.notice_modal_view');
Route::get('/news-and-events', [FrontendController::class, 'noticeAll'])->name('frontend.notices');


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/download', [FrontendController::class, 'download'])->name('frontend.download'); //new

Route::get('/contact-us', [FrontendController::class, 'contactUs'])->name('frontend.contact');
Route::post('/send-message', [FrontendController::class, 'sendMessage'])->name('frontend.send_message');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
