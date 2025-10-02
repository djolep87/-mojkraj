<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PetComment extends Model
{
    use HasFactory;

    protected $table = 'pets_comments';

    protected $fillable = [
        'pets_post_id',
        'user_id',
        'parent_id',
        'content',
        'likes_count'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(PetPost::class, 'pets_post_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(PetComment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(PetComment::class, 'parent_id')->orderBy('created_at', 'desc');
    }

    public function isReply(): bool
    {
        return !is_null($this->parent_id);
    }
}
