<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'building_id',
        'category',
        'amount',
        'date',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'date' => 'date',
        ];
    }

    // Relacije
    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class);
    }

    // Scope za filtriranje po kategoriji
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    // Scope za filtriranje po datumu
    public function scopeInDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('date', [$startDate, $endDate]);
    }

    // Scope za filtriranje po mesecu
    public function scopeInMonth($query, $year, $month)
    {
        return $query->whereYear('date', $year)
            ->whereMonth('date', $month);
    }

    // Scope za filtriranje po godini
    public function scopeInYear($query, $year)
    {
        return $query->whereYear('date', $year);
    }

    // Metoda za formatiranje iznosa
    public function getFormattedAmountAttribute(): string
    {
        return number_format($this->amount, 2, ',', '.') . ' RSD';
    }
}