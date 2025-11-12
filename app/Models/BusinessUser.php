<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class BusinessUser extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'password',
        'business_type',
        'address',
        'neighborhood',
        'city',
        'postal_code',
        'description',
        'website',
        'logo',
        'is_verified',
        'is_active',
        'latitude',
        'longitude',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'is_verified' => 'boolean',
            'is_active' => 'boolean',
            'latitude' => 'decimal:8',
            'longitude' => 'decimal:8',
        ];
    }

    public function businesses()
    {
        return $this->hasMany(Business::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    // Business ratings relacije
    public function ratings()
    {
        return $this->hasMany(BusinessRating::class);
    }

    public function ratingReplies()
    {
        return $this->hasMany(BusinessRatingReply::class);
    }
}