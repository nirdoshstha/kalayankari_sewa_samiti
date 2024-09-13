<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurService extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'our_services';
    protected $fillable = [
        'parent_id',
        'title',
        'sub_title',
        'slug',
        'design',
        'rank',
        'image',
        'description',
        'status',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'created_by',
        'updated_by'
    ];

    public function parentId(){
        return $this->belongsTo(OurService::class,'parent_id');
    }
    public function subCategories(){
        return $this->hasMany(OurService::class,'parent_id');
    }
    // public function subsubCategories(){
    //     return $this->hasMany(OurService::class,'parent_id','id');
    // }
    

     
}
