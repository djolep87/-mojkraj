<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VoteResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_option_id',
        'user_id',
    ];

    // Relacije
    public function voteOption(): BelongsTo
    {
        return $this->belongsTo(VoteOption::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope za filtriranje po korisniku
    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    // Scope za filtriranje po opciji glasanja
    public function scopeByOption($query, $optionId)
    {
        return $query->where('vote_option_id', $optionId);
    }
}