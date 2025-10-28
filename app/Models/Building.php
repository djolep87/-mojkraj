<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Building extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'neighborhood',
        'lat',
        'lng',
    ];

    protected function casts(): array
    {
        return [
            'lat' => 'decimal:8',
            'lng' => 'decimal:8',
        ];
    }

    // Relacije
    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'building_user')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function managers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'building_user')
            ->wherePivot('role_in_building', 'manager')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function joinRequests(): HasMany
    {
        return $this->hasMany(BuildingJoinRequest::class);
    }

    public function pendingJoinRequests(): HasMany
    {
        return $this->hasMany(BuildingJoinRequest::class)->where('status', 'pending');
    }

    public function residents(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'building_user')
            ->wherePivot('role_in_building', 'resident')
            ->withPivot('role_in_building')
            ->withTimestamps();
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function expenses(): HasMany
    {
        return $this->hasMany(Expense::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class);
    }

    // Scope za filtriranje po gradu
    public function scopeInCity($query, $city)
    {
        return $query->where('city', $city);
    }

    // Scope za filtriranje po naselju
    public function scopeInNeighborhood($query, $neighborhood)
    {
        return $query->where('neighborhood', $neighborhood);
    }

    // Scope za filtriranje po gradu i naselju
    public function scopeInArea($query, $city, $neighborhood)
    {
        return $query->where('city', $city)
                    ->where('neighborhood', $neighborhood);
    }

    // Metoda za proveru da li je korisnik manager
    public function isManager(User $user): bool
    {
        return $this->users()->where('user_id', $user->id)
            ->wherePivot('role_in_building', 'manager')
            ->exists();
    }

    // Metoda za proveru da li je korisnik resident
    public function isResident(User $user): bool
    {
        return $this->users()->where('user_id', $user->id)
            ->wherePivot('role_in_building', 'resident')
            ->exists();
    }

    // Metoda za proveru da li je korisnik član zgrade
    public function hasUser(User $user): bool
    {
        return $this->users()->where('user_id', $user->id)->exists();
    }
}