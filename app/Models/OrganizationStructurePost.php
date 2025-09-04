<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationStructurePost extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'organization_structure_posts';
    protected $fillable = [
        'category_id',
        'title',
        'sub_title',
        'designation',
        'image',
        'rank',
        'start_date',
        'end_date',
        'description',
        'status',
        'created_by',
        'updated_by'
    ];

    public function category()
    {
        return $this->belongsTo(OrganizationStructure::class, 'category_id', 'id');
    }
}
