<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRatingReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_rating_id',
        'business_user_id',
        'reply',
    ];

    // Relacije
    public function businessRating()
    {
        return $this->belongsTo(BusinessRating::class);
    }

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }
}
