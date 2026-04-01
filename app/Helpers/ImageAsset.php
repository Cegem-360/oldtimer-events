<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Vite;

class ImageAsset
{
    protected static ?array $map = null;

    public static function url(string $filename): string
    {
        return static::map()[$filename] ?? $filename;
    }

    protected static function map(): array
    {
        if (static::$map !== null) {
            return static::$map;
        }

        static::$map = [
            'coastal-classic.webp' => Vite::asset('resources/images/coastal-classic.webp'),
            'jaguar-etype.webp' => Vite::asset('resources/images/jaguar-etype.webp'),
            'concours-elegance.webp' => Vite::asset('resources/images/concours-elegance.webp'),
            'alfa-romeo.webp' => Vite::asset('resources/images/alfa-romeo.webp'),
            'classic-auction.webp' => Vite::asset('resources/images/classic-auction.webp'),
            'vintage-garage.webp' => Vite::asset('resources/images/vintage-garage.webp'),
            'museum-exhibition.webp' => Vite::asset('resources/images/museum-exhibition.webp'),
        ];

        return static::$map;
    }
}
