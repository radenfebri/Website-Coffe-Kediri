<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorit extends Model
{
    use HasFactory;

    protected $table = 'favorits';

    protected $fillable = [
        'user_id',
        'prod_id',
    ];

    public function produks()
    {
        return $this->belongsTo(Produk::class, 'prod_id', 'id');
    }
}
