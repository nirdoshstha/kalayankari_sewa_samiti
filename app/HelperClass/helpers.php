<?php

use App\Models\Blog;
use App\Models\Team;
use App\Models\Video;
use App\Models\Notice;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Setting;
use App\Models\Download;
use App\Models\OurService;
use App\Models\PopupModal;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

function image_path($path)
{
    return asset('storage/' . $path);
}

function raw_image_path($path)
{
    return public_path('storage/' . $path);
}

function deleteImage($image)
{
    if ($image && File::exists(raw_image_path($image))) {
        unlink(raw_image_path($image));
    }
}

if (!function_exists('setting')) {
    function setting()
    {
        $setting = Setting::first();
        return $setting;
    }
}

if(!function_exists('modals')){
    function modals(){
        $modal = PopupModal::active()->get();
        return $modal;
    }
}

if (!function_exists('sliders')) {
    function sliders()
    {
        $sliders = Slider::latest()->active()->where('type','post')->get();
        return $sliders;
    }
}

if (!function_exists('teams')) {
    function teams()
    {
        $teams = Team::active()->where('type','post')->orderBy('rank','asc')->get();
        return $teams;
    }
}

if (!function_exists('notices')) {
    function notices()
    {
        $notices = Notice::active()->where('type','post')->latest()->take(3)->get();
        return $notices;
    }
}

if (!function_exists('testimonials')) {
    function testimonials()
    {
        $testimonials = Testimonial::active()->where('type','post')->latest()->get();
        return $testimonials;
    }
}

if (!function_exists('video')) {
    function video()
    {
        $video = Video::active()->where('type','post')->latest()->first();
        return $video;
    }
}

if (!function_exists('downloads')) {
    function downloads()
    {
        $downloads = Download::where('type','post')->orderBy('rank')->get();
        return $downloads;
    }
}

if (!function_exists('categories')) {
    function categories()
    {
        $categories = OurService::active()->where('parent_id',null)->orderBy('rank','asc')->get();
        return $categories;
    }
}


if (!function_exists('contactusCount')) {
    function contactusCount()
    {
        $count_contact = Contact::where('type','contact')->count(); 
        return $count_contact;
    }
}

if (!function_exists('applyCount')) {
    function applyCount()
    {
        $count_apply = Contact::where('type','apply')->count(); 
        return $count_apply;
    }
}

if (!function_exists('noticeCount')) {
    function noticeCount()
    {
        $count_notice = Notice::where('type','post')->count(); 
        return $count_notice;
    }
}

if (!function_exists('blogCount')) {
    function blogCount()
    {
        $count_blog = Blog::where('type','post')->count(); 
        return $count_blog;
    }
}
