<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends BackendBaseModel
{
    use HasFactory;
    protected $table ='sliders';
    protected $fillable =[
        'type',
        'title',
        'sub_title',
        'image',
        'link',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];
}
