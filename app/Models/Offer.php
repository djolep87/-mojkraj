<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_user_id',
        'title',
        'description',
        'offer_type',
        'original_price',
        'discount_price',
        'discount_percentage',
        'valid_from',
        'valid_until',
        'valid_time_from',
        'valid_time_until',
        'images',
        'category',
        'is_active',
        'is_featured',
        'views',
        'likes',
    ];

    protected $casts = [
        'images' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'original_price' => 'decimal:2',
        'discount_price' => 'decimal:2',
        'valid_from' => 'date',
        'valid_until' => 'date',
        'valid_time_from' => 'datetime:H:i',
        'valid_time_until' => 'datetime:H:i',
    ];

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeValid($query)
    {
        $now = now();
        return $query->where(function($q) use ($now) {
            $q->whereNull('valid_from')
              ->orWhere('valid_from', '<=', $now);
        })->where(function($q) use ($now) {
            $q->whereNull('valid_until')
              ->orWhere('valid_until', '>=', $now);
        });
    }

    public function incrementViews()
    {
        $this->views++;
        $this->save();
    }

    public function incrementLikes()
    {
        $this->likes++;
        $this->save();
    }
}
