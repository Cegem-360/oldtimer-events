<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'featured' => 'boolean',
            'lat' => 'decimal:6',
            'lng' => 'decimal:6',
        ];
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeCategory($query, string $category)
    {
        return $query->where('category', $category);
    }

    public function scopeCountry($query, string $country)
    {
        return $query->where('country', $country);
    }

    public function getCategoryColorAttribute(): string
    {
        return match ($this->category) {
            'Rally' => '#556B2F',
            'Concours' => '#D1A93B',
            'Museum' => '#6B7280',
            'Auction' => '#9B1C1C',
            default => '#5A5A4E',
        };
    }
}
