<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_payment',
        'trackingStatus',
    ];
    protected $primaryKey = 'id_tracking';
}
