<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_user_id',
        'title',
        'description',
        'type',
        'price',
        'discount_percentage',
        'valid_from',
        'valid_until',
        'valid_time_from',
        'valid_time_until',
        'images',
        'is_active',
        'is_featured',
        'views',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'valid_from' => 'date',
            'valid_until' => 'date',
            'valid_time_from' => 'datetime:H:i',
            'valid_time_until' => 'datetime:H:i',
            'images' => 'array',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'views' => 'integer',
        ];
    }

    public function businessUser()
    {
        return $this->belongsTo(BusinessUser::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeValid($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('valid_until')
              ->orWhere('valid_until', '>=', now());
        });
    }
}