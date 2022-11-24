<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = ['order_id', 'prod_id', 'price', 'qty'];

    protected $hidden = [];

    public function produks(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'prod_id', 'id');
    }
}
