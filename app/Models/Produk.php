<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produks';

    protected $fillable = [
        'kategori_id', 'name', 'description', 'small_description', 'original_price', 'slug',
        'selling_price', 'cover', 'popular', 'is_active', 'qty'
    ];

    protected $hidden = [];

    public function kategoriproduk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'prod_id', 'id');
    }

    public function multi_image()
    {
        return $this->hasMany(MultiImage::class);
    }
}
