<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRatingHelpfulVote extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_rating_id',
        'user_id',
    ];

    // Relacije
    public function businessRating()
    {
        return $this->belongsTo(BusinessRating::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
