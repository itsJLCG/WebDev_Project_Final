<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
    ];

    protected $primaryKey = 'id_order';

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relationship with Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class, 'id_tracking', 'id_order');
    }

    
}
