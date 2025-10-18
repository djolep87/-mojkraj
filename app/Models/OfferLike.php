<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'user_id',
        'business_user_id',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }
}