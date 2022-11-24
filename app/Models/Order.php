<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = ['order_id', 'name', 'email', 'alamat','status', 'message', 'no_hp','tracking_no', 'total_price', 'message_admin'];

    protected $hidden = [];

    public function orderitem()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
