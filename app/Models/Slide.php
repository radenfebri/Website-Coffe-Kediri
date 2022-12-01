<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'deskripsi',
        'link',
        'image',
        'button_text',
        'status',
    ];
}
