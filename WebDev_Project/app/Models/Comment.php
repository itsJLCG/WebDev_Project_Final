<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tracking',
        'comment',
        'commentImage',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_tracking', 'id_order');
    }

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class, 'id_orderDetail');
    }
}
