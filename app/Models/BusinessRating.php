<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BusinessRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'business_user_id',
        'rating',
        'review',
        'emoji',
        'helpful_count',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'integer',
            'helpful_count' => 'integer',
        ];
    }

    // Relacije
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }

    public function helpfulVotes()
    {
        return $this->hasMany(BusinessRatingHelpfulVote::class);
    }

    public function reply()
    {
        return $this->hasOne(BusinessRatingReply::class);
    }

    // Scope za dohvatanje prosečne ocene
    public static function getAverageRating($businessUserId)
    {
        return Cache::remember("business_rating_avg_{$businessUserId}", 3600, function () use ($businessUserId) {
            $average = self::where('business_user_id', $businessUserId)
                ->avg('rating');
            return $average ? (float) $average : 0.0;
        });
    }

    // Scope za dohvatanje ukupnog broja ocena
    public static function getTotalRatings($businessUserId)
    {
        return Cache::remember("business_rating_total_{$businessUserId}", 3600, function () use ($businessUserId) {
            return self::where('business_user_id', $businessUserId)
                ->count();
        });
    }

    // Clear cache when rating is created/updated/deleted
    public static function clearRatingCache($businessUserId)
    {
        Cache::forget("business_rating_avg_{$businessUserId}");
        Cache::forget("business_rating_total_{$businessUserId}");
    }

    // Provera da li korisnik već ima ocenu za ovaj biznis
    public static function userHasRating($userId, $businessUserId)
    {
        return self::where('user_id', $userId)
            ->where('business_user_id', $businessUserId)
            ->exists();
    }

    // Provera da li je korisnik već glasao za korisnost recenzije
    public function userHasVoted($userId)
    {
        return $this->helpfulVotes()
            ->where('user_id', $userId)
            ->exists();
    }
}
