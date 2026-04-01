<?php

namespace App\Models;

use App\Helpers\ImageAsset;
use Illuminate\Database\Eloquent\Model;

class GarageCar extends Model
{
    protected $guarded = [];

    public function getImageUrlAttribute(): string
    {
        return ImageAsset::url($this->image);
    }
}
