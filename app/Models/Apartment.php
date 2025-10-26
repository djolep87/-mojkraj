<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Apartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'number',
        'floor',
        'owner_id',
    ];

    // Relacije
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Scope za filtriranje po spratu
    public function scopeOnFloor($query, $floor)
    {
        return $query->where('floor', $floor);
    }

    // Scope za filtriranje po broju stana
    public function scopeWithNumber($query, $number)
    {
        return $query->where('number', $number);
    }
}