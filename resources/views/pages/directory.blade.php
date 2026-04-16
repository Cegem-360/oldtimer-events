<x-layouts.public title="Restaurátorok & Hirdetések">
    {{-- Header --}}
    <div class="bg-brand-green px-4 py-10">
        <div class="max-w-7xl mx-auto">
            <p class="text-brand-gold-dark font-semibold text-xs tracking-[0.2em] mb-2">CÉGES HIRDETÉSEK</p>
            <h1 class="font-serif text-gold-gradient font-bold text-4xl uppercase tracking-wider">Restaurátorok & Cégek</h1>
            <div class="gold-divider w-[70px] mt-1.5"></div>
            <p class="text-white/70 text-sm mt-3 max-w-lg">
                Veterán autó restaurátorok, alkatrész-kereskedők és szakműhelyek Európa-szerte. Találja meg a megfelelő szakembert járművéhez.
            </p>
        </div>
    </div>

    <div class="bg-brand-parchment min-h-screen" x-data="{ category: 'all' }">
        <div class="max-w-7xl mx-auto px-4 py-8">
            {{-- Category filter --}}
            <div class="flex flex-wrap gap-2 mb-8">
                @foreach ([
                    ['key' => 'all', 'label' => 'Összes'],
                    ['key' => 'restaurator', 'label' => 'Restaurátorok'],
                    ['key' => 'alkatresz', 'label' => 'Alkatrészek'],
                    ['key' => 'szerviz', 'label' => 'Szerviz & Karbantartás'],
                    ['key' => 'kereskedelem', 'label' => 'Jármű Kereskedelem'],
                    ['key' => 'biztositas', 'label' => 'Biztosítás & Értékbecslés'],
                ] as $cat)
                    <button @click="category = '{{ $cat['key'] }}'"
                            class="px-5 py-2 rounded-full font-semibold text-sm tracking-wide border transition-colors"
                            :class="category === '{{ $cat['key'] }}' ? 'bg-brand-gold-dark border-brand-gold-dark text-brand-dark' : 'bg-white border-brand-border text-brand-muted hover:border-brand-gold-dark'">
                        {{ $cat['label'] }}
                    </button>
                @endforeach
            </div>

            {{-- Listings grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @php
                    $listings = [
                        ['name' => 'Kővári Restaurátor Műhely', 'category' => 'restaurator', 'location' => 'Budapest, Magyarország', 'desc' => 'Teljes körű veterán autó restaurálás 30 éves tapasztalattal. Karosszéria, motor, fényezés.', 'tags' => ['Teljes restaurálás', 'Karosszéria', 'Fényezés']],
                        ['name' => 'Classic Parts Europe', 'category' => 'alkatresz', 'location' => 'Wien, Ausztria', 'desc' => 'Eredeti és utángyártott alkatrészek európai veterán járművekhez. Kiterjedt raktárkészlet.', 'tags' => ['Eredeti alkatrészek', 'Utángyártás', 'Szállítás EU-ban']],
                        ['name' => 'Heritage Motors Service', 'category' => 'szerviz', 'location' => 'München, Németország', 'desc' => 'Klasszikus járművek szakszerű karbantartása és szervizelése. Mercedes, BMW, Porsche specialista.', 'tags' => ['Szerviz', 'Mercedes', 'BMW', 'Porsche']],
                        ['name' => 'Veteran Auto Kereskedés', 'category' => 'kereskedelem', 'location' => 'Győr, Magyarország', 'desc' => 'Válogatott veterán és klasszikus járművek adásvétele. Bizományosi értékesítés.', 'tags' => ['Adásvétel', 'Bizomány', 'Értékbecslés']],
                        ['name' => 'Balaton Classic Garage', 'category' => 'restaurator', 'location' => 'Balatonfüred, Magyarország', 'desc' => 'Veterán járművek restaurálása a Balaton partján. Motor-felújítás, króm, kárpitozás.', 'tags' => ['Motor', 'Króm', 'Kárpitozás']],
                        ['name' => 'OldTimer Insure', 'category' => 'biztositas', 'location' => 'Zürich, Svájc', 'desc' => 'Speciális veterán jármű biztosítás és értékbecslés. Verseny- és rally biztosítás.', 'tags' => ['Biztosítás', 'Értékbecslés', 'Rally']],
                        ['name' => 'Pannonia Autóalkatrész', 'category' => 'alkatresz', 'location' => 'Sopron, Magyarország', 'desc' => 'Magyar és szovjet gyártmányú veteránok alkatrészei. Wartburg, Trabant, Lada, Skoda.', 'tags' => ['Wartburg', 'Trabant', 'Lada']],
                        ['name' => 'Grand Prix Restoration', 'category' => 'restaurator', 'location' => 'Modena, Olaszország', 'desc' => 'Olasz sportautók restaurálása: Ferrari, Alfa Romeo, Maserati, Lancia. Concours minőség.', 'tags' => ['Ferrari', 'Alfa Romeo', 'Concours']],
                        ['name' => 'Vintage Wheels Trading', 'category' => 'kereskedelem', 'location' => 'Brüsszel, Belgium', 'desc' => 'Európai klasszikusok közvetítése. Jaguar, Aston Martin, Bentley specialista.', 'tags' => ['Jaguar', 'Aston Martin', 'Közvetítés']],
                    ];
                @endphp

                @foreach ($listings as $listing)
                    <div x-show="category === 'all' || category === '{{ $listing['category'] }}'"
                         x-transition
                         class="bg-white border border-brand-border rounded-xl overflow-hidden shadow-sm hover:-translate-y-1 transition-transform group">
                        {{-- Color strip top --}}
                        <div class="h-1.5 bg-gold-gradient"></div>

                        <div class="p-6">
                            {{-- Category badge --}}
                            <span class="inline-block bg-brand-green/10 text-brand-green text-[0.7rem] font-semibold tracking-wider rounded-full px-3 py-1 mb-3 uppercase">
                                {{ ['restaurator' => 'Restaurátor', 'alkatresz' => 'Alkatrészek', 'szerviz' => 'Szerviz', 'kereskedelem' => 'Kereskedelem', 'biztositas' => 'Biztosítás'][$listing['category']] }}
                            </span>

                            <h3 class="font-serif text-brand-dark font-bold text-xl leading-tight mb-1">{{ $listing['name'] }}</h3>

                            <div class="flex items-center gap-1 mb-3">
                                <svg class="w-3.5 h-3.5 text-brand-gold-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                <span class="text-brand-muted text-xs font-medium">{{ $listing['location'] }}</span>
                            </div>

                            <p class="text-brand-muted text-sm leading-relaxed mb-4">{{ $listing['desc'] }}</p>

                            {{-- Tags --}}
                            <div class="flex flex-wrap gap-1.5 mb-4">
                                @foreach ($listing['tags'] as $tag)
                                    <span class="text-[0.7rem] font-medium text-brand-muted bg-brand-parchment rounded-full px-2.5 py-0.5 border border-brand-border">{{ $tag }}</span>
                                @endforeach
                            </div>

                            <div class="flex items-center gap-3">
                                <a href="#" class="inline-block border border-brand-gold-dark text-brand-gold-dark font-semibold text-xs tracking-widest rounded px-4 py-2 hover:bg-amber-400/10 transition-colors">
                                    KAPCSOLAT
                                </a>
                                <a href="#" class="text-brand-muted text-xs font-medium hover:text-brand-gold-dark transition-colors">
                                    Részletek &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- CTA Banner --}}
            <div class="border-2 border-brand-gold-dark rounded-xl p-8 text-center mt-12 bg-white">
                <h3 class="font-serif text-brand-dark font-bold text-2xl mb-2">Hirdesse cégét nálunk</h3>
                <p class="text-brand-muted text-sm mb-5 max-w-lg mx-auto">
                    Jelenjen meg Európa veterán autós közösségének szeme előtt. Restaurátor műhely, alkatrész kereskedés, vagy bármilyen kapcsolódó vállalkozás hirdetését várjuk.
                </p>
                <a href="{{ route('membership') }}" class="inline-block bg-gold-gradient text-brand-dark font-bold text-sm tracking-widest rounded-md px-8 py-3 transition-opacity hover:opacity-90">
                    HIRDETÉS FELADÁSA
                </a>
            </div>
        </div>
    </div>
</x-layouts.public>
