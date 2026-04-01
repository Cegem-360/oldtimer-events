<x-layouts.public title="Museums & Collections">
    {{-- Header --}}
    <div class="bg-brand-green px-4 py-8">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row sm:items-end justify-between gap-4">
            <div>
                <h1 class="font-serif text-gold-gradient font-bold text-4xl uppercase">Museums & Collections</h1>
                <div class="gold-divider w-[70px] mt-1.5"></div>
            </div>
            <p class="text-white/70 text-sm max-w-xs">Discover Europe's finest automotive museums and private collections.</p>
        </div>
    </div>

    <div class="bg-brand-parchment min-h-screen">
        <div class="max-w-7xl mx-auto px-4 py-8" x-data="{ selectedCountry: 'All Countries' }">
            {{-- Map --}}
            <div class="bg-brand-green border border-brand-gold-dark/15 rounded-xl p-6 mb-8">
                <h3 class="text-brand-gold-dark font-semibold text-xs tracking-widest mb-4">MUSEUM MAP</h3>
                <div class="relative bg-brand-green-dark rounded-lg overflow-hidden" style="height: 280px;">
                    <div class="absolute inset-0 opacity-15">
                        <svg viewBox="0 0 800 500" class="w-full h-full">
                            <path d="M100,60 L150,40 L200,55 L260,40 L320,50 L380,35 L440,45 L500,35 L560,50 L620,40 L680,60 L720,90 L730,130 L720,170 L740,210 L720,250 L700,290 L680,330 L650,360 L610,390 L570,420 L530,440 L490,450 L450,440 L410,460 L370,455 L330,440 L290,420 L250,400 L210,380 L170,360 L130,340 L100,310 L80,270 L65,230 L70,190 L55,150 L70,110 Z"
                                  fill="rgba(255,255,255,0.05)" stroke="rgba(209,169,59,0.4)" stroke-width="1"/>
                        </svg>
                    </div>
                    @php
                        $positions = [
                            1 => ['x' => 56, 'y' => 62],
                            2 => ['x' => 50, 'y' => 45],
                            3 => ['x' => 56, 'y' => 40],
                            4 => ['x' => 63, 'y' => 47],
                            5 => ['x' => 47, 'y' => 38],
                            6 => ['x' => 59, 'y' => 65],
                        ];
                    @endphp
                    @foreach ($museums as $museum)
                        @php $pos = $positions[$museum->id] ?? ['x' => 50, 'y' => 50]; @endphp
                        <div class="absolute z-10 group" style="left: {{ $pos['x'] }}%; top: {{ $pos['y'] }}%; transform: translate(-50%, -50%);">
                            <div class="w-5 h-5 bg-brand-gold-dark rounded flex items-center justify-center shadow-[0_0_10px_rgba(209,169,59,0.5)] group-hover:bg-brand-gold-light transition-colors cursor-pointer">
                                <span class="text-[0.65rem]">&#127963;</span>
                            </div>
                            <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1.5 bg-brand-green-dark border border-brand-gold-dark rounded-md px-3 py-2 whitespace-nowrap hidden group-hover:block z-20">
                                <p class="text-white font-semibold text-xs">{{ $museum->name }}</p>
                                <p class="text-brand-gold-dark text-[0.68rem]">{{ $museum->city }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Filter + Grid --}}
            <div class="flex flex-col lg:flex-row gap-8">
                {{-- Sidebar --}}
                <aside class="lg:w-52 shrink-0">
                    <div class="bg-white border border-brand-border rounded-[10px] p-5 sticky top-20">
                        <h4 class="text-brand-dark font-bold text-xs tracking-widest mb-4">FILTER BY COUNTRY</h4>
                        <button @click="selectedCountry = 'All Countries'"
                                class="block w-full text-left px-3 py-1.5 rounded-md text-sm mb-0.5 transition-colors"
                                :class="selectedCountry === 'All Countries' ? 'bg-brand-gold-dark/10 text-brand-gold-dark font-bold border-l-[3px] border-brand-gold-dark' : 'text-brand-muted border-l-[3px] border-transparent'">
                            All Countries
                        </button>
                        @foreach ($countries as $c)
                            <button @click="selectedCountry = '{{ $c }}'"
                                    class="block w-full text-left px-3 py-1.5 rounded-md text-sm mb-0.5 transition-colors"
                                    :class="selectedCountry === '{{ $c }}' ? 'bg-brand-gold-dark/10 text-brand-gold-dark font-bold border-l-[3px] border-brand-gold-dark' : 'text-brand-muted border-l-[3px] border-transparent'">
                                {{ $c }}
                            </button>
                        @endforeach
                    </div>
                </aside>

                {{-- Grid --}}
                <div class="flex-1 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach ($museums as $museum)
                        <div x-show="selectedCountry === 'All Countries' || selectedCountry === '{{ $museum->country }}'"
                             x-transition
                             class="bg-white border border-brand-border rounded-[10px] overflow-hidden shadow-sm group hover:-translate-y-1 transition-transform">
                            <div class="h-44 overflow-hidden">
                                <img src="{{ $museum->image_url }}" alt="{{ $museum->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                            <div class="p-5">
                                <div class="flex items-center gap-1 mb-1">
                                    <svg class="w-3 h-3 text-brand-gold-dark shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                                    <span class="text-brand-muted text-[0.72rem] font-semibold">{{ $museum->city }}, {{ $museum->country }}</span>
                                </div>
                                <h3 class="font-serif text-brand-dark font-bold text-lg leading-tight mb-2">{{ $museum->name }}</h3>
                                <p class="text-brand-muted text-xs leading-relaxed line-clamp-2 mb-3">{{ $museum->description }}</p>
                                <button class="border border-brand-gold-dark text-brand-gold-dark font-semibold text-[0.72rem] tracking-wider rounded px-3 py-1.5 inline-flex items-center gap-1 hover:bg-amber-50 transition-colors">
                                    &#8599; VISIT PAGE
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>
