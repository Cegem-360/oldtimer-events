<?php

namespace App\Models;

use App\Helpers\ImageAsset;
use Illuminate\Database\Eloquent\Model;

class Museum extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'lat' => 'decimal:6',
            'lng' => 'decimal:6',
        ];
    }

    public function getImageUrlAttribute(): string
    {
        return ImageAsset::url($this->image);
    }
}
