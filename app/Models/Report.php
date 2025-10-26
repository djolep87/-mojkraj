<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'user_id',
        'title',
        'description',
        'status',
        'photo',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'string',
        ];
    }

    // Relacije
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope za filtriranje po statusu
    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }

    public function scopeClosed($query)
    {
        return $query->where('status', 'closed');
    }

    // Metoda za označavanje kao zatvoreno
    public function markAsClosed(): void
    {
        $this->update(['status' => 'closed']);
    }

    // Metoda za označavanje kao otvoreno
    public function markAsOpen(): void
    {
        $this->update(['status' => 'open']);
    }
}