<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Event;
use App\Models\GarageCar;
use App\Models\Museum;
use Illuminate\Database\Seeder;

class OldtimerSeeder extends Seeder
{
    public function run(): void
    {
        Event::insert([
            [
                'slug' => 'riviera-grand-tour-2025',
                'title' => 'The Riviera Grand Tour',
                'date' => '2025-05-24',
                'date_display' => '24 MAY 2025',
                'location' => 'Nice, French Riviera',
                'country' => 'France',
                'category' => 'Rally',
                'description' => "A magnificent touring rally along the sun-drenched Côte d'Azur, celebrating the golden age of post-war motoring. Pre-war and post-war classics welcome.",
                'distance' => '320 km',
                'image' => 'coastal-classic.webp',
                'featured' => true,
                'price' => '€450',
                'lat' => 43.7102,
                'lng' => 7.262,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'highland-rally-2025',
                'title' => 'Highland Rally',
                'date' => '2025-06-18',
                'date_display' => '18 JUN 2025',
                'location' => 'Inverness, Scotland',
                'country' => 'United Kingdom',
                'category' => 'Rally',
                'description' => 'Navigate the dramatic Scottish Highlands in your cherished classic. Castles, lochs and spectacular highland roads await.',
                'distance' => '280 km',
                'image' => 'jaguar-etype.webp',
                'featured' => true,
                'price' => '€320',
                'lat' => 57.477,
                'lng' => -4.224,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'alpine-concours-2025',
                'title' => "Alpine Concours d'Élégance",
                'date' => '2025-07-07',
                'date_display' => '07 JUL 2025',
                'location' => 'Montreux, Switzerland',
                'country' => 'Switzerland',
                'category' => 'Concours',
                'description' => "The prestigious Concours d'Élégance set against the stunning backdrop of Lake Geneva and the Swiss Alps. Best in Show awarded by international jury.",
                'image' => 'concours-elegance.webp',
                'featured' => true,
                'price' => '€280',
                'lat' => 46.4312,
                'lng' => 6.9107,
                'distance' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'balatonfured-concours-2025',
                'title' => "Balatonfüred Concours d'Élégance",
                'date' => '2025-08-15',
                'date_display' => '15 AUG 2025',
                'location' => 'Balatonfüred, Hungary',
                'country' => 'Hungary',
                'category' => 'Concours',
                'description' => "Central Europe's premier concours event beside the stunning Lake Balaton. Hungarian and international classics compete for the Grand Prix d'Honneur.",
                'image' => 'alfa-romeo.webp',
                'featured' => false,
                'price' => '€180',
                'lat' => 46.9503,
                'lng' => 17.8959,
                'distance' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'spa-classic-2025',
                'title' => 'Spa Classic',
                'date' => '2025-09-12',
                'date_display' => '12 SEP 2025',
                'location' => 'Spa-Francorchamps, Belgium',
                'country' => 'Belgium',
                'category' => 'Rally',
                'description' => "Legendary historic racing at one of the world's greatest circuits. Pre-1966 racing machines tackle the full Spa-Francorchamps layout.",
                'image' => 'classic-auction.webp',
                'featured' => false,
                'price' => '€520',
                'lat' => 50.4372,
                'lng' => 5.9714,
                'distance' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'vintage-mille-miglia-2025',
                'title' => 'Mille Miglia Storica',
                'date' => '2025-05-15',
                'date_display' => '15 MAY 2025',
                'location' => 'Brescia, Italy',
                'country' => 'Italy',
                'category' => 'Rally',
                'description' => "The world's most beautiful race. 1000 miles through the heart of Italy in pre-1957 racing and sports cars.",
                'distance' => '1600 km',
                'image' => 'vintage-garage.webp',
                'featured' => true,
                'price' => '€2,800',
                'lat' => 45.5397,
                'lng' => 10.2143,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Museum::insert([
            ['name' => "Museo Nazionale dell'Automobile", 'city' => 'Turin', 'country' => 'Italy', 'description' => "Italy's national automobile museum with over 200 vehicles spanning 130 years of motoring history.", 'image' => 'museum-exhibition.webp', 'lat' => 45.03, 'lng' => 7.67, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => "Cité de l'Automobile", 'city' => 'Mulhouse', 'country' => 'France', 'description' => "The world's largest car museum featuring 450+ vehicles including the legendary Bugatti collection.", 'image' => 'concours-elegance.webp', 'lat' => 47.73, 'lng' => 7.32, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Porsche Museum', 'city' => 'Stuttgart', 'country' => 'Germany', 'description' => 'Over 80 vehicles on permanent display at the iconic Porsche factory museum in Stuttgart-Zuffenhausen.', 'image' => 'coastal-classic.webp', 'lat' => 48.83, 'lng' => 9.15, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Magyar Műszaki és Közlekedési Múzeum', 'city' => 'Budapest', 'country' => 'Hungary', 'description' => "Hungary's transport and technology museum with a notable vintage automobile collection.", 'image' => 'alfa-romeo.webp', 'lat' => 47.51, 'lng' => 19.05, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Autoworld Brussels', 'city' => 'Brussels', 'country' => 'Belgium', 'description' => 'Over 250 veteran, vintage and classic cars displayed in the magnificent Cinquantenaire Palace.', 'image' => 'classic-auction.webp', 'lat' => 50.84, 'lng' => 4.39, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Museo Ferrari', 'city' => 'Maranello', 'country' => 'Italy', 'description' => 'The official Ferrari museum celebrating the iconic prancing horse in its spiritual home.', 'image' => 'vintage-garage.webp', 'lat' => 44.53, 'lng' => 10.86, 'website' => null, 'created_at' => now(), 'updated_at' => now()],
        ]);

        GarageCar::insert([
            ['make' => 'Jaguar E-Type', 'year' => '1963', 'owner' => 'James Thornton', 'country' => 'United Kingdom', 'era' => 'Post-War', 'story' => 'Restored over six years in a barn in the Cotswolds, this Series 1 3.8 litre roadster has won Best in Show at three consecutive concours.', 'image' => 'jaguar-etype.webp', 'created_at' => now(), 'updated_at' => now()],
            ['make' => 'Alfa Romeo Giulietta Sprint', 'year' => '1958', 'owner' => 'Marco Ferrante', 'country' => 'Italy', 'era' => 'Post-War', 'story' => 'A family heirloom passed down three generations, this Bertone-bodied Sprint has participated in the Mille Miglia Storica four times.', 'image' => 'alfa-romeo.webp', 'created_at' => now(), 'updated_at' => now()],
            ['make' => 'Mercedes-Benz 300 SL', 'year' => '1955', 'owner' => 'Hans-Werner Kiefer', 'country' => 'Germany', 'era' => 'Post-War', 'story' => 'The legendary Gullwing, number 427 of 1,400 produced. Matching numbers, original Rubikonrot finish painstakingly preserved.', 'image' => 'vintage-garage.webp', 'created_at' => now(), 'updated_at' => now()],
            ['make' => 'Bentley 4½ Litre', 'year' => '1928', 'owner' => 'William Ashford', 'country' => 'United Kingdom', 'era' => 'Vintage', 'story' => "One of the famous Bentley Boys' racers, campaigned at Le Mans in 1929. A rolling piece of motorsport heritage.", 'image' => 'classic-auction.webp', 'created_at' => now(), 'updated_at' => now()],
            ['make' => 'Lancia Aurelia B20 GT', 'year' => '1952', 'owner' => 'Pierre Dubois', 'country' => 'France', 'era' => 'Post-War', 'story' => 'The car that defined the gran turismo genre. Entered in numerous Rallye Monte-Carlo Historic events by its current custodian.', 'image' => 'concours-elegance.webp', 'created_at' => now(), 'updated_at' => now()],
            ['make' => 'Porsche 356 Speedster', 'year' => '1957', 'owner' => 'Klaus Berger', 'country' => 'Germany', 'era' => 'Post-War', 'story' => 'California-spec Speedster that returned to Europe in 1998. Correct Irish Green over tan leather, original Porsche engine.', 'image' => 'coastal-classic.webp', 'created_at' => now(), 'updated_at' => now()],
        ]);

        Banner::insert([
            ['title' => 'Kővári Restaurátor Műhely', 'category' => 'Restaurátor', 'location' => 'Budapest, Magyarország', 'image' => 'banner-1.webp', 'url' => null, 'active' => true, 'sort_order' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Classic Parts Europe', 'category' => 'Alkatrészek', 'location' => 'Wien, Ausztria', 'image' => 'banner-2.webp', 'url' => null, 'active' => true, 'sort_order' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Heritage Motors Service', 'category' => 'Szerviz', 'location' => 'München, Németország', 'image' => 'banner-3.webp', 'url' => null, 'active' => true, 'sort_order' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Veteran Auto Kereskedés', 'category' => 'Kereskedelem', 'location' => 'Győr, Magyarország', 'image' => 'banner-4.webp', 'url' => null, 'active' => true, 'sort_order' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Balaton Classic Garage', 'category' => 'Restaurátor', 'location' => 'Balatonfüred, Magyarország', 'image' => 'banner-5.webp', 'url' => null, 'active' => true, 'sort_order' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'OldTimer Insure', 'category' => 'Biztosítás', 'location' => 'Zürich, Svájc', 'image' => 'banner-6.webp', 'url' => null, 'active' => true, 'sort_order' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Pannonia Autóalkatrész', 'category' => 'Alkatrészek', 'location' => 'Sopron, Magyarország', 'image' => 'banner-7.webp', 'url' => null, 'active' => true, 'sort_order' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Grand Prix Restoration', 'category' => 'Restaurátor', 'location' => 'Modena, Olaszország', 'image' => 'banner-8.webp', 'url' => null, 'active' => true, 'sort_order' => 8, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
