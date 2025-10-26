<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VoteOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'vote_id',
        'option_text',
    ];

    // Relacije
    public function vote(): BelongsTo
    {
        return $this->belongsTo(Vote::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(VoteResult::class);
    }

    // Metoda za dobijanje broja glasova za ovu opciju
    public function getVoteCountAttribute(): int
    {
        return $this->results()->count();
    }

    // Metoda za dobijanje procenta glasova
    public function getVotePercentageAttribute(): float
    {
        $totalVotes = $this->vote->total_votes;
        
        if ($totalVotes === 0) {
            return 0;
        }
        
        return round(($this->vote_count / $totalVotes) * 100, 2);
    }
}