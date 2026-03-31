<x-layouts.public title="Map">
    <div class="bg-brand-green min-h-screen">
        <div class="px-4 pt-6 pb-0 max-w-7xl mx-auto">
            <h1 class="font-serif text-gold-gradient font-bold text-4xl uppercase tracking-wider">Explore the Map</h1>
            <div class="gold-divider w-16 mt-1.5 mb-6"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 pb-8">
            <div class="flex gap-6 flex-col lg:flex-row">
                {{-- Filter Sidebar --}}
                <aside class="w-full lg:w-60 shrink-0" x-data="{ selectedCountry: 'All', search: '' }">
                    <div class="bg-brand-green-dark border border-brand-gold-dark/20 rounded-[10px] p-5">
                        <h3 class="text-brand-gold-dark font-semibold text-xs tracking-[0.12em] mb-4">EVENT TYPE</h3>
                        @foreach (['Rally', 'Concours', 'Museum', 'Auction'] as $cat)
                            <label class="flex items-center gap-2 mb-2.5 cursor-pointer">
                                <input type="checkbox" class="accent-brand-gold-dark w-3.5 h-3.5">
                                <span class="text-white/85 text-sm">{{ $cat }}</span>
                            </label>
                        @endforeach

                        <div class="h-px bg-brand-gold-dark/15 my-4"></div>

                        <h3 class="text-brand-gold-dark font-semibold text-xs tracking-[0.12em] mb-3">COUNTRY</h3>
                        <div class="relative mb-4">
                            <svg class="w-3.5 h-3.5 absolute left-2 top-1/2 -translate-y-1/2 text-white/40" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                            <input type="text" x-model="search" placeholder="Search country..."
                                   class="w-full bg-white/[0.07] border border-brand-gold-dark/15 rounded-md pl-7 pr-2 py-2 text-white text-sm outline-none">
                        </div>
                        @foreach (['All Countries', 'France', 'United Kingdom', 'Switzerland', 'Hungary', 'Belgium', 'Italy'] as $c)
                            <button x-show="search === '' || '{{ strtolower($c) }}'.includes(search.toLowerCase())"
                                    @click="selectedCountry = '{{ $c }}'"
                                    class="block w-full text-left px-2 py-1 rounded text-sm mb-0.5 transition-colors"
                                    :class="selectedCountry === '{{ $c }}' ? 'bg-brand-gold-dark/15 text-brand-gold-dark' : 'text-white/70 hover:text-white'">
                                {{ $c }}
                            </button>
                        @endforeach

                        <div class="h-px bg-brand-gold-dark/15 my-4"></div>
                        <h3 class="text-brand-gold-dark font-semibold text-xs tracking-[0.12em] mb-3">DATE RANGE</h3>
                        <div class="flex items-center gap-1.5 bg-white/[0.07] border border-brand-gold-dark/15 rounded-md px-3 py-2 text-white/50 text-sm">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>May &ndash; Dec 2025</span>
                        </div>
                    </div>
                </aside>

                {{-- Map --}}
                <div class="flex-1">
                    <div id="leaflet-map" class="rounded-xl overflow-hidden border border-brand-gold-dark/15" style="height: 480px;"></div>

                    {{-- Featured Events below map --}}
                    <div class="mt-8">
                        <h2 class="font-serif text-white font-bold text-xl mb-4">Featured Events</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($events->take(3) as $event)
                                <a href="{{ route('events.show', $event->slug) }}" class="rounded-lg overflow-hidden block relative" style="aspect-ratio: 16/10;">
                                    <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(34,69,46,0.85) 0%, transparent 60%);"></div>
                                    <div class="absolute bottom-2 left-2.5">
                                        <p class="text-brand-gold-dark font-bold text-[0.7rem] tracking-wide">{{ $event->date_display }}</p>
                                        <p class="text-white font-semibold text-sm font-serif">{{ $event->title }}</p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const map = L.map('leaflet-map').setView([48, 10], 4);
            L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; OpenStreetMap contributors &copy; CARTO',
                maxZoom: 19,
            }).addTo(map);

            const events = @json($events);
            const goldIcon = L.divIcon({
                html: '<div style="width:16px;height:16px;background:#D1A93B;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 0 8px rgba(209,169,59,0.6);"></div>',
                iconSize: [16, 16],
                iconAnchor: [8, 16],
                popupAnchor: [0, -16],
                className: '',
            });

            events.forEach(function (e) {
                if (e.lat && e.lng) {
                    L.marker([e.lat, e.lng], { icon: goldIcon })
                        .addTo(map)
                        .bindPopup(`
                            <div style="font-family:Montserrat,sans-serif;min-width:180px;">
                                <p style="color:#D1A93B;font-weight:700;font-size:0.75rem;margin-bottom:2px;">${e.date_display}</p>
                                <p style="font-weight:700;font-size:0.95rem;margin-bottom:4px;">${e.title}</p>
                                <p style="color:#666;font-size:0.78rem;margin-bottom:6px;">${e.location}</p>
                                <a href="/events/${e.slug}" style="color:#D1A93B;font-weight:600;font-size:0.78rem;">View Details &rarr;</a>
                            </div>
                        `);
                }
            });
        });
    </script>
</x-layouts.public>
