<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'status',
        'date_of_delivery',
        'total_price',
    ];

    public function user(){
        return $this->belongTo(User::class, 'user_id');
    }

    public function items(){
        return $this->hasMany(OrderItem::class);
    }
}
