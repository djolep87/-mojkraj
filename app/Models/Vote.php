<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'title',
        'description',
        'deadline',
    ];

    protected function casts(): array
    {
        return [
            'deadline' => 'datetime',
        ];
    }

    // Relacije
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(VoteOption::class);
    }

    public function results(): HasManyThrough
    {
        return $this->hasManyThrough(
            VoteResult::class,
            VoteOption::class,
            'vote_id',        // Foreign key on vote_options table
            'vote_option_id', // Foreign key on vote_results table
            'id',             // Local key on votes table
            'id'              // Local key on vote_options table
        );
    }

    // Scope za aktivna glasanja
    public function scopeActive($query)
    {
        return $query->where('deadline', '>', now());
    }

    // Scope za završena glasanja
    public function scopeExpired($query)
    {
        return $query->where('deadline', '<=', now());
    }

    // Metoda za proveru da li je glasanje aktivno
    public function isActive(): bool
    {
        return $this->deadline > now();
    }

    // Metoda za proveru da li je glasanje završeno
    public function isExpired(): bool
    {
        return $this->deadline <= now();
    }

    // Metoda za dobijanje ukupnog broja glasova
    public function getTotalVotesAttribute(): int
    {
        return $this->results()->count();
    }

    // Metoda za proveru da li je korisnik već glasao
    public function hasUserVoted(User $user): bool
    {
        return $this->results()
            ->where('user_id', $user->id)
            ->exists();
    }
}