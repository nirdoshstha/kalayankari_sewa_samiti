<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends BackendBaseModel
{
    use HasFactory;
    protected $table ='blogs';
    protected $fillable =[
        'type',
        'title',
        'slug',
        'image',
        'rank',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];
}
