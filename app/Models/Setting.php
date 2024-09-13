<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $table ='settings';
    protected $fillable =[
        'email',
        'phone',
        'mobile',
        'address',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'instagram',
        'viber',
        'whatsapp',
        'general_info',
        'years',
        'happy_parents',
        'alumni',
        'google_map',
        'logo',
        'fav_icon',
        'image',
        'created_by',
        'updated_by'
    ];
} 