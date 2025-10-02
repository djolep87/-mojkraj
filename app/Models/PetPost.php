<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PetPost extends Model
{
    use HasFactory;

    protected $table = 'pets_posts';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'pet_type',
        'pet_breed',
        'pet_age',
        'pet_gender',
        'post_type',
        'location',
        'contact_phone',
        'contact_email',
        'images',
        'videos',
        'is_urgent',
        'is_active',
        'likes_count',
        'comments_count'
    ];

    protected $casts = [
        'images' => 'array',
        'videos' => 'array',
        'is_urgent' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(PetComment::class, 'pets_post_id')->whereNull('parent_id');
    }

    public function allComments(): HasMany
    {
        return $this->hasMany(PetComment::class, 'pets_post_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(PetLike::class, 'pets_post_id');
    }

    public function isLikedBy(User $user): bool
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByType($query, $type)
    {
        return $query->where('post_type', $type);
    }

    public function scopeByPetType($query, $petType)
    {
        return $query->where('pet_type', $petType);
    }

    public function scopeUrgent($query)
    {
        return $query->where('is_urgent', true);
    }
}
