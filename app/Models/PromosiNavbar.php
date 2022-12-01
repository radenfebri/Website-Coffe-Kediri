<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromosiNavbar extends Model
{
    use HasFactory;

    protected $table = 'promosi_navbars';

    protected $fillable = [
        'title',
        'deskripsi',
        'link',
        'button_text',
        'status',
    ];
}
