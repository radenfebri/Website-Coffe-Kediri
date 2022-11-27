<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'atas_nama',
        'nama_bank',
        'no_rek',
        'kategori',
    ];
}
