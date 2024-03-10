<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InKindDonation extends Model
{
    use HasFactory;

    protected $table = 'inkinds';
    protected $fillable = ['ProofOfDonationInKind', 'user_id', 'DescriptionDonation', 'InkindDateOffered'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
