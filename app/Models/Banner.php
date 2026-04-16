<?php

namespace App\Models;

use App\Helpers\ImageAsset;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'active' => 'boolean',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        return ImageAsset::url($this->image);
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
