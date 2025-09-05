<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationStructure extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'organization_structures';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
        'designation',
        'image',
        'rank',
        'start_date',
        'end_date',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status_home',
        'status',
        'created_by',
        'updated_by'
    ];

    public function posts()
    {
        return $this->hasMany(OrganizationStructurePost::class, 'category_id', 'id');
    }
}
