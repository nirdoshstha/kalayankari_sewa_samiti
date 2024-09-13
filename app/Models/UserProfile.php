<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table ='user_profiles';
    protected $fillable =[
        'user_id',
        'image',
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
        'info',
        'created_by',
        'updated_by'
    ];
     
}
