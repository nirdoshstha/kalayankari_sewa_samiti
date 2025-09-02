<?php

use App\Models\Blog;
use App\Models\Chairperson;
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
use App\Models\ThakaliHead;
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



if (!function_exists('sliders')) {
    function sliders()
    {
        $sliders = Slider::latest()->active()->where('type', 'post')->get();
        return $sliders;
    }
}


if (!function_exists('countDownload')) {
    function countDownload()
    {
        $downloads = Download::where('type', 'post')->count();
        return $downloads;
    }
}

if (!function_exists('contactusCount')) {
    function contactusCount()
    {
        $count_contact = Contact::where('type', 'contact')->count();
        return $count_contact;
    }
}

if (!function_exists('countThakali')) {
    function countThakali()
    {
        $count_thakali = ThakaliHead::where('type', 'post')->count();
        return $count_thakali;
    }
}

if (!function_exists('countNotice')) {
    function countNotice()
    {
        $count_notice = Notice::where('type', 'post')->count();
        return $count_notice;
    }
}

if (!function_exists('countChairperson')) {
    function countChairperson()
    {
        $count = Chairperson::where('type', 'post')->count();
        return $count;
    }
}

if (!function_exists('chairpersons')) {
    function chairpersons()
    {
        $chairpersons = Chairperson::where('type', 'post')->limit(6)->get();
        return $chairpersons;
    }
}
