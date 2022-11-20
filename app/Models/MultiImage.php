<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'prod_id',
    ];

    public function produks()
    {
        return $this->belongsTo(Produk::class);
    }
}
