<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PetLike extends Model
{
    use HasFactory;

    protected $table = 'pets_likes';

    protected $fillable = [
        'pets_post_id',
        'user_id'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(PetPost::class, 'pets_post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
