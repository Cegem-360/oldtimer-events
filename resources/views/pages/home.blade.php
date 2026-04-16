<x-layouts.public title="Home">
    {{-- HERO --}}
    <section class="relative min-h-[60vh] flex flex-col justify-center items-center overflow-hidden">
        <img src="{{ Vite::asset('resources/images/oldtimer-events-hero.webp') }}"
             alt="Classic car" class="absolute inset-0 w-full h-full object-cover object-bottom">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute bottom-0 left-0 right-0 h-1 bg-gold-gradient"></div>

        <div class="relative z-10 text-center px-4 max-w-3xl mx-auto">
            <h1 class="font-serif text-gold-gradient font-bold uppercase mb-4 leading-tight tracking-wide"
                style="font-size: clamp(2rem, 5vw, 3.5rem);">
                DISCOVER. EUROPE'S MOST ICONIC CLASSIC CAR EVENTS
            </h1>
            <p class="text-white/88 text-base font-semibold tracking-[0.08em] mb-8">
                RALLIES, CONCOURS, AUCTIONS &amp; MUSEUMS ACROSS THE CONTINENT
            </p>

            <form action="{{ route('events.index') }}" method="GET" class="flex max-w-xl mx-auto shadow-xl">
                <input type="text" name="q" placeholder="Search by Country, Event Type, or Date..."
                       class="flex-1 bg-white rounded-l-lg px-5 py-3.5 text-brand-dark text-sm outline-none border-none">
                <button type="submit" class="bg-gold-gradient text-brand-dark rounded-r-lg px-5 font-bold flex items-center gap-2">
                    <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </button>
            </form>

            {{-- TODO: implement real slider --}}p
            <div class="hidden! justify-center gap-2 mt-5" x-data="{ active: 0 }">
                <template x-for="i in 4">
                    <button @click="active = i - 1"
                            class="h-2 rounded-full transition-all"
                            :class="active === i - 1 ? 'w-5 bg-brand-gold-dark' : 'w-2 bg-white/35'"></button>
                </template>
            </div>
        </div>
    </section>

    {{-- HIRDETÉSEK CAROUSEL --}}
    @if ($banners->isNotEmpty())
        <section class="bg-brand-green py-6">
            <div class="max-w-7xl mx-auto px-4">
                <div class="flex items-center justify-between mb-4 mx-12">
                    <h2 class="font-serif text-gold-gradient font-bold text-xl tracking-wide">Partnereink & Hirdetők</h2>
                    <a href="{{ route('directory') }}" class="text-brand-gold-dark text-sm font-medium hover:underline flex items-center gap-1">
                        Összes hirdetés
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            <div class="max-w-7xl mx-auto px-4 relative"
                 x-data="bannerCarousel({{ $banners->count() }})">
                {{-- Arrows --}}
                <button @click.prevent="prev()"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-brand-green-dark hover:bg-brand-gold-dark/20 text-brand-gold-dark rounded-full w-10 h-10 flex items-center justify-center transition-colors shadow-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button @click.prevent="next()"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-brand-green-dark hover:bg-brand-gold-dark/20 text-brand-gold-dark rounded-full w-10 h-10 flex items-center justify-center transition-colors shadow-lg cursor-pointer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>

                {{-- Track --}}
                <div class="overflow-hidden mx-12">
                    <div x-ref="track" class="flex gap-4 transition-transform duration-500 ease-in-out"
                         :style="'transform: translateX(-' + pos + 'px)'">
                        @foreach ($banners as $banner)
                            <a href="{{ route('directory') }}"
                               class="shrink-0 w-[280px] sm:w-[320px] lg:w-[360px] block rounded-lg overflow-hidden border border-brand-gold-dark/20 hover:border-brand-gold-dark/60 transition-colors"
                               title="{{ $banner->title }}">
                                <img src="{{ $banner->image_url }}"
                                     alt="{{ $banner->title }}"
                                     class="w-full aspect-square object-cover">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- FEATURED EVENTS --}}
    <section class="bg-brand-parchment py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="font-serif text-brand-dark font-bold text-3xl tracking-wide">Featured Events</h2>
                    <div class="gold-divider w-16 mt-1.5"></div>
                </div>
                <a href="{{ route('events.index') }}" class="text-brand-muted text-sm font-medium flex items-center gap-1 hover:text-amber-700">
                    View All
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($featuredEvents as $event)
                    @include('partials.event-card', ['event' => $event])
                @endforeach
            </div>
        </div>
    </section>

    {{-- EXPLORE THE MAP --}}
    <section class="bg-brand-green py-16 px-4 relative overflow-hidden">
        <div class="absolute inset-0 opacity-5" style="background-image: url(&quot;data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23fff' fill-opacity='1'%3E%3Crect x='0' y='0' width='20' height='20'/%3E%3Crect x='20' y='20' width='20' height='20'/%3E%3C/g%3E%3C/svg%3E&quot;)"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <div class="flex-1 text-center lg:text-left">
                    <h2 class="font-serif text-gold-gradient font-bold text-4xl mb-3">EXPLORE THE MAP</h2>
                    <div class="gold-divider w-16 mb-4 mx-auto lg:mx-0"></div>
                    <p class="text-white/80 text-[0.95rem] leading-relaxed mb-6 max-w-md mx-auto lg:mx-0">
                        Discover classic car events across Europe on our interactive map. Filter by type, country, and date to find your next adventure.
                    </p>
                    <a href="{{ route('map') }}" class="inline-block bg-gold-gradient text-brand-dark font-bold text-sm tracking-widest rounded-md px-8 py-3 transition-opacity hover:opacity-90">
                        OPEN FULL MAP
                    </a>
                </div>
                <div class="flex-1 w-full max-w-lg">
                    <div class="bg-brand-green-dark border border-brand-gold-dark/20 rounded-xl p-6 relative overflow-hidden" style="aspect-ratio: 16/10;">
                        <div class="text-gray-400 text-xs tracking-widest mb-2">EUROPE</div>
                        @foreach ([['top' => '20%', 'left' => '48%', 'label' => 'Spa Classic'], ['top' => '35%', 'left' => '38%', 'label' => 'Riviera GT'], ['top' => '45%', 'left' => '55%', 'label' => 'Alpine Concours'], ['top' => '25%', 'left' => '30%', 'label' => 'Highland Rally'], ['top' => '55%', 'left' => '60%', 'label' => 'Mille Miglia']] as $pin)
                            <div class="absolute" style="top: {{ $pin['top'] }}; left: {{ $pin['left'] }};">
                                <div class="w-4 h-4 bg-brand-gold-dark rounded-[50%_50%_50%_0] -rotate-45 shadow-[0_0_8px_rgba(209,169,59,0.5)]"></div>
                                <div class="text-brand-gold-dark text-[0.65rem] font-semibold whitespace-nowrap mt-1.5 -translate-x-1/2">{{ $pin['label'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CATEGORIES ROW --}}
    <section class="bg-brand-parchment py-12 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ([
                    ['title' => 'UPCOMING EVENTS', 'items' => ['Mille Miglia Storica', 'Riviera Grand Tour', 'Highland Rally'], 'route' => 'events.index'],
                    ['title' => 'CLUBS & COMMUNITIES', 'items' => ['The Vintage Rally Club', 'Alpine Drivers Association', 'Classic Car Circle'], 'route' => 'garage'],
                    ['title' => 'MUSEUMS & COLLECTIONS', 'items' => ["Museo Nazionale Automobile", "Cité de l'Automobile", 'Porsche Museum Stuttgart'], 'route' => 'museums'],
                ] as $cat)
                    <a href="{{ route($cat['route']) }}" class="bg-white border border-brand-border rounded-[10px] p-6 block group hover:border-amber-400 transition-colors">
                        <h4 class="text-brand-dark font-bold text-xs tracking-wider mb-2">{{ $cat['title'] }}</h4>
                        @foreach ($cat['items'] as $item)
                            <p class="text-brand-muted text-sm leading-relaxed">{{ $item }}</p>
                        @endforeach
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SUBMIT YOUR EVENT --}}
    <section class="bg-white border-t border-brand-border py-16 px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="font-serif text-brand-dark font-bold text-3xl tracking-wide mb-2">Promote Your Event</h2>
            <p class="text-brand-muted text-[0.92rem] leading-relaxed mb-8">
                List your classic car event and reach thousands of enthusiasts across Europe. Free basic listing available.
            </p>
            <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto mb-4">
                <input type="email" placeholder="your@email.com"
                       class="flex-1 border border-brand-border bg-brand-parchment rounded-md px-4 py-3 text-brand-dark text-sm outline-none">
                <button type="submit" class="bg-gold-gradient text-brand-dark font-bold text-xs tracking-widest rounded-md px-6 py-3 whitespace-nowrap">
                    SUBMIT EVENT
                </button>
            </form>
            <a href="{{ route('events.create') }}" class="text-brand-gold-dark font-semibold text-sm hover:underline">
                Or create a full event listing &rarr;
            </a>
        </div>
    </section>

    <script>
        function bannerCarousel(count) {
            return {
                pos: 0,
                total: count,
                step: 376,
                maxPos: 0,
                init() {
                    this.step = window.innerWidth < 640 ? 296 : (window.innerWidth < 1024 ? 336 : 376);
                    this.$nextTick(() => {
                        this.maxPos = Math.max(0, this.$refs.track.scrollWidth - this.$refs.track.parentElement.offsetWidth);
                    });
                    setInterval(() => {
                        if (this.pos >= this.maxPos) {
                            this.pos = 0;
                        } else {
                            this.pos = Math.min(this.pos + this.step, this.maxPos);
                        }
                    }, 3000);
                },
                prev() {
                    this.pos = Math.max(0, this.pos - this.step);
                },
                next() {
                    this.pos = Math.min(this.maxPos, this.pos + this.step);
                }
            };
        }
    </script>
</x-layouts.public>
