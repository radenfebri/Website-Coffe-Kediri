<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TigaPromosi extends Model
{
    use HasFactory;

    protected $table = 'tiga_promosis';

    protected $fillable = [
        'title1',
        'title2',
        'link',
        'image',
        'button_text',
        'status',
    ];
}
