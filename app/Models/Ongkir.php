<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ongkir extends Model
{
    use HasFactory;

    protected $table = 'ongkirs';

    protected $hidden = [];

    protected $fillable = [
        'kecamatan',
        'harga',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
