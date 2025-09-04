<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstitutionRule extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'constitution_rules';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
        'image',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'status',
        'created_by',
        'updated_by'
    ];
}
