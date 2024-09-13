<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'facilities';
    protected $fillable =[
        'type',
        'title',
        'sub_title',
        'slug',
        'image',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];

    public function images()
    {
        return $this->morphMany(Imageable::class,'imageable');
    }
}
