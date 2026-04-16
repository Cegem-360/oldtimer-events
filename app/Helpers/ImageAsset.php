<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Vite;

class ImageAsset
{
    public static function url(string $filename): string
    {
        return Vite::asset('resources/images/' . $filename);
    }
}
