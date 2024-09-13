<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'downloads';
    protected $fillable =[
        'type',
        'title',
        'sub_title', 
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
