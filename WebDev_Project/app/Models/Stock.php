<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_product',
        'stockQuantity',
    ];

    protected $primaryKey = 'id_stock';

    // Define the relationship with Product model
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }


}
