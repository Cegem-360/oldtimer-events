<x-layouts.public :title="$event->title">
    {{-- Hero --}}
    <div class="relative h-80 md:h-96 overflow-hidden">
        <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-brand-green/[0.65]"></div>
        <div class="absolute inset-0 flex flex-col justify-end p-6 md:p-10">
            <nav class="flex items-center gap-1 mb-3 text-white/[0.65] text-xs">
                <a href="{{ route('home') }}" class="hover:text-amber-300">Home</a>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <a href="{{ route('events.index') }}" class="hover:text-amber-300">Events</a>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-brand-gold-dark">{{ $event->title }}</span>
            </nav>
            <h1 class="font-serif text-white font-bold leading-tight" style="font-size: clamp(1.8rem, 4vw, 3rem);">
                {{ $event->title }}
            </h1>
        </div>
    </div>

    {{-- Meta Row --}}
    <div class="bg-brand-green py-3 px-4">
        <div class="max-w-7xl mx-auto flex flex-wrap gap-4 md:gap-8 items-center">
            <div class="flex items-center gap-1.5 text-white/85 text-sm font-medium">
                <svg class="w-3.5 h-3.5 text-brand-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $event->date_display }}
            </div>
            <div class="flex items-center gap-1.5 text-white/85 text-sm font-medium">
                <svg class="w-3.5 h-3.5 text-brand-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                {{ $event->location }}, {{ $event->country }}
            </div>
            @if ($event->distance)
                <div class="flex items-center gap-1.5 text-white/85 text-sm font-medium">
                    <svg class="w-3.5 h-3.5 text-brand-gold-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    {{ $event->distance }}
                </div>
            @endif
            <div class="ml-auto">
                <span class="text-white font-semibold text-[0.7rem] tracking-widest rounded-full px-3 py-1"
                      style="background-color: {{ $event->category_color }};">
                    {{ strtoupper($event->category) }}
                </span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-3 gap-10">
        {{-- Main Content --}}
        <div class="lg:col-span-2">
            {{-- Description --}}
            <section class="bg-white border border-brand-border rounded-[10px] p-8 mb-8">
                <h2 class="font-serif text-brand-dark font-bold text-2xl mb-4">About this Event</h2>
                <div class="gold-divider w-12 mb-4"></div>
                <p class="text-brand-muted leading-relaxed text-[0.95rem]">{{ $event->description }}</p>
                <p class="text-brand-muted leading-relaxed text-[0.95rem] mt-4">
                    Join us for an unforgettable experience celebrating the golden age of motoring. Whether you're a seasoned competitor or a passionate spectator, this event offers something truly special for every classic car enthusiast.
                </p>
            </section>

            {{-- Map Placeholder --}}
            <section class="bg-brand-green border border-brand-gold-dark/20 rounded-[10px] p-6 mb-8">
                <h3 class="text-brand-gold-dark font-semibold text-xs tracking-widest mb-4">EVENT LOCATION</h3>
                <div class="bg-brand-green-dark rounded-lg h-[220px] flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-8 h-8 text-brand-gold-dark mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <p class="text-white/60 font-medium">{{ $event->location }}</p>
                        <p class="text-white/40 text-xs mt-1">Interactive map &mdash; Leaflet.js integration</p>
                    </div>
                </div>
            </section>

            {{-- Gallery --}}
            <section>
                <h3 class="font-serif text-brand-dark font-bold text-xl mb-4">Gallery</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    @foreach (\App\Models\Event::take(6)->get() as $e)
                        <div class="rounded-lg overflow-hidden" style="aspect-ratio: 4/3;">
                            <img src="{{ $e->image }}" alt="" class="w-full h-full object-cover hover:scale-105 transition-transform cursor-pointer">
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

        {{-- Sidebar --}}
        <div>
            <div class="bg-white border-2 border-brand-gold-dark rounded-[10px] p-7 sticky top-20">
                <h3 class="font-serif text-brand-dark font-bold text-xl mb-4">Register Your Entry</h3>

                @foreach ([
                    ['name' => 'Standard Listing', 'price' => 'Free', 'features' => ['Basic event entry', 'Listed in calendar', 'Contact details'], 'highlight' => false],
                    ['name' => 'Normal Monthly', 'price' => '€29/mo', 'features' => ['Enhanced listing', 'More photos', 'Priority placement'], 'highlight' => false],
                    ['name' => 'Premium Featured', 'price' => '€99/mo', 'features' => ['Homepage placement', 'Gold border badge', 'Top of search results', 'Featured newsletter'], 'highlight' => true],
                ] as $tier)
                    <div class="border rounded-lg p-4 mb-3 relative
                        {{ $tier['highlight'] ? 'border-2 border-brand-gold-dark bg-brand-gold-dark/5' : 'border-brand-border' }}">
                        @if ($tier['highlight'])
                            <div class="absolute -top-2.5 right-2.5 bg-gold-gradient text-brand-dark font-bold text-[0.6rem] tracking-widest rounded-full px-2.5 py-0.5">
                                &#9733; MOST POPULAR
                            </div>
                        @endif
                        <div class="flex justify-between items-center mb-1">
                            <span class="font-bold text-sm text-brand-dark">{{ $tier['name'] }}</span>
                            <span class="text-brand-gold-dark font-bold text-[0.95rem]">{{ $tier['price'] }}</span>
                        </div>
                        @foreach ($tier['features'] as $f)
                            <p class="text-brand-muted text-xs mb-0.5">&check; {{ $f }}</p>
                        @endforeach
                    </div>
                @endforeach

                <button class="w-full bg-gold-gradient text-brand-dark font-bold text-sm tracking-widest rounded-md py-3.5 mt-2 transition-opacity hover:opacity-90">
                    REGISTER NOW
                </button>
            </div>
        </div>
    </div>

    {{-- Related Events --}}
    <section class="bg-brand-parchment py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <h2 class="font-serif text-brand-dark font-bold text-2xl mb-6">Related Events</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach ($relatedEvents as $e)
                    @include('partials.event-card', ['event' => $e])
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
