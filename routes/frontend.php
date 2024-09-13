<?php

use App\Http\Controllers\frontend\FrontendController; 
use Illuminate\Support\Facades\Route;



Route::get('/',[FrontendController::class,'index'])->name('frontend.index');
Route::get('notice-modal-view',[FrontendController::class,'noticeModalView'])->name('frontend.notice_modal_view');
Route::get('/notices',[FrontendController::class,'noticeAll'])->name('frontend.notices');




Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/album',[FrontendController::class,'album'])->name('frontend.album'); 
Route::get('/album/{slug}',[FrontendController::class,'albumImages'])->name('frontend.album_images');

Route::get('/video',[FrontendController::class,'videoGallery'])->name('frontend.video'); 

Route::get('/facility',[FrontendController::class,'facility'])->name('frontend.facility'); 
Route::get('academy/class-information',[FrontendController::class,'classInformation'])->name('frontend.class_information'); 

Route::get('/blog',[FrontendController::class,'blog'])->name('frontend.blog'); 
Route::get('/blog/{slug}',[FrontendController::class,'blogSinglePage'])->name('frontend.blog_single_page');


Route::get('/contact-us',[FrontendController::class,'contactUs'])->name('frontend.contact');
Route::post('/send-message',[FrontendController::class,'sendMessage'])->name('frontend.send_message'); 

Route::get('/admission-form',[FrontendController::class,'admissionForm'])->name('frontend.admission_form');
Route::post('/admission-form/store',[FrontendController::class,'admissionFormStore'])->name('frontend.admission_form_store');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
Route::get('/{cat_slug}',[FrontendController::class,'services'])->name('frontend.our_services');