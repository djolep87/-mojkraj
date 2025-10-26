<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'title',
        'content',
        'pinned',
    ];

    protected function casts(): array
    {
        return [
            'pinned' => 'boolean',
        ];
    }

    // Relacije
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    // Scope za prikvačene objave
    public function scopePinned($query)
    {
        return $query->where('pinned', true);
    }

    // Scope za neprikvačene objave
    public function scopeUnpinned($query)
    {
        return $query->where('pinned', false);
    }

    // Scope za sortiranje (prikvačene prvo, zatim po datumu)
    public function scopeOrdered($query)
    {
        return $query->orderBy('pinned', 'desc')
            ->orderBy('created_at', 'desc');
    }

    // Metoda za prikvačivanje objave
    public function pin(): void
    {
        $this->update(['pinned' => true]);
    }

    // Metoda za otkvačivanje objave
    public function unpin(): void
    {
        $this->update(['pinned' => false]);
    }
}