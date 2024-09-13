<?php

namespace App\Models;

use App\Models\Imageable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Album extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'albums';
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
