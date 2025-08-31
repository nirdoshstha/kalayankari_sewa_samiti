<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThakaliHead extends BackendBaseModel
{
    use HasFactory;
    protected $table = 'thakali_heads';
    protected $fillable = [
        'type',
        'title',
        'sub_title',
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
}
