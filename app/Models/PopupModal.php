<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopupModal extends BackendBaseModel
{
    use HasFactory;
    protected $table ='popup_modals';
    protected $fillable =[
        'title',
        'description',
        'image',
        'link',
        'file',
        'views',
        'status',
        'created_by',
        'updated_by'
    ];
}
