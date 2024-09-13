<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassInformation extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'class_informations';
    protected $fillable =[
        'type',
        'title',
        'sub_title',
        'slug',
        'image',
        'description',
        'rank',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];

}
