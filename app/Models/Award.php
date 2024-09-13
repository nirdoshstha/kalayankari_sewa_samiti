<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Award extends BackendBaseModel
{
    use HasFactory;
    protected $table ='awards';
    protected $fillable =[
        'type',
        'title',
        'sub_title',
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
