<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingWebsite extends Model
{
    use HasFactory;
    
    protected $table = 'setting_websites';
    
    protected $fillable = [
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'youtube',
        'image',
        'favicon'
    ];
}
