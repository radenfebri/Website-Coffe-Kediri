<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';

    protected $fillable = ['user_id', 'prod_id', 'prod_qty'];

    protected $hidden = [];

    public function produks()
    {
        return $this->belongsTo(Produk::class, 'prod_id', 'id');
    }
}
