<x-layouts.public title="The Garage">
    <div class="bg-brand-green min-h-screen"
         x-data="{
            filterType: 'make',
            selected: 'All',
            makes: ['All', 'Jaguar', 'Alfa Romeo', 'Mercedes-Benz', 'Bentley', 'Lancia', 'Porsche'],
            eras: ['All', 'Vintage', 'Post-War', 'Modern Classic'],
            countries: ['All', 'United Kingdom', 'Italy', 'Germany', 'France'],
            get options() { return this[this.filterType === 'make' ? 'makes' : this.filterType === 'era' ? 'eras' : 'countries']; },
            matches(car) {
                if (this.selected === 'All') return true;
                if (this.filterType === 'era') return car.era === this.selected;
                if (this.filterType === 'country') return car.country === this.selected;
                return car.make.toLowerCase().includes(this.selected.toLowerCase());
            }
         }">

        {{-- Header --}}
        <div class="px-4 pt-10 pb-6 max-w-7xl mx-auto">
            <h1 class="font-serif text-gold-gradient font-bold uppercase tracking-wider" style="font-size: clamp(2.5rem, 6vw, 4rem);">THE GARAGE</h1>
            <div class="gold-divider w-[70px] mt-1.5"></div>
            <p class="text-white/70 text-[0.95rem] mt-3 italic font-serif">Stories from the owners of Europe's most cherished classics</p>
        </div>

        {{-- Filter Tabs --}}
        <div class="px-4 max-w-7xl mx-auto mb-6">
            <div class="flex flex-wrap gap-2">
                @foreach (['make' => 'Make', 'era' => 'Era', 'country' => 'Country'] as $key => $label)
                    <button @click="filterType = '{{ $key }}'; selected = 'All'"
                            class="px-5 py-1.5 rounded-full font-semibold text-xs tracking-wider uppercase border transition-colors"
                            :class="filterType === '{{ $key }}' ? 'bg-brand-gold-dark border-brand-gold-dark text-brand-dark' : 'bg-transparent border-white/20 text-white/70'">
                        By {{ $label }}
                    </button>
                @endforeach
            </div>
            <div class="flex flex-wrap gap-2 mt-3">
                <template x-for="opt in options" :key="opt">
                    <button @click="selected = opt"
                            class="px-3.5 py-1 rounded-full text-xs font-medium border transition-colors"
                            :class="selected === opt ? 'bg-brand-gold-dark/20 border-brand-gold-dark text-brand-gold-dark' : 'bg-transparent border-white/10 text-white/55'">
                        <span x-text="opt"></span>
                    </button>
                </template>
            </div>
        </div>

        {{-- Cars Grid --}}
        <div class="max-w-7xl mx-auto px-4 pb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($cars as $car)
                    <div x-show="matches({ make: '{{ addslashes($car->make) }}', era: '{{ $car->era }}', country: '{{ $car->country }}' })"
                         x-transition
                         class="bg-brand-green-dark border border-brand-gold-dark/20 rounded-[10px] overflow-hidden group">
                        <div class="relative h-52 overflow-hidden">
                            <img src="{{ $car->image }}" alt="{{ $car->make }}"
                                 class="w-full h-full object-cover transition-all duration-400 grayscale-[85%] group-hover:grayscale-0 group-hover:scale-105">
                            <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(26,52,34,0.9) 0%, transparent 60%);"></div>
                            <div class="absolute top-2.5 left-2.5 bg-brand-gold-dark text-brand-dark font-bold text-[0.65rem] tracking-widest rounded px-2 py-0.5">
                                {{ $car->year }}
                            </div>
                            <div class="absolute bottom-2.5 left-3">
                                <p class="text-brand-gold-dark font-bold text-[0.68rem] tracking-widest">{{ strtoupper($car->country) }}</p>
                            </div>
                        </div>
                        <div class="p-5">
                            <h3 class="font-serif text-white font-bold text-xl mb-1">{{ $car->make }}</h3>
                            <p class="text-brand-gold-dark font-semibold text-xs mb-3 tracking-wide">{{ $car->owner }} &middot; {{ $car->era }}</p>
                            <p class="text-white/[0.65] text-sm leading-relaxed line-clamp-3">{{ $car->story }}</p>
                            <button class="mt-4 border border-brand-gold-dark text-brand-gold-dark font-semibold text-xs tracking-widest rounded px-4 py-1.5 hover:bg-amber-400/10 transition-colors">
                                VIEW FULL STORY
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- CTA Banner --}}
            <div class="border-2 border-brand-gold-dark rounded-[10px] p-8 text-center mt-12 bg-brand-gold-dark/5">
                <h3 class="font-serif text-white font-bold text-2xl mb-2">Share Your Classic's Story</h3>
                <p class="text-white/[0.65] text-sm mb-5">Every great car has a story. Join the Oldtimer Events Garage and share yours with Europe's classic car community.</p>
                <button class="bg-gold-gradient text-brand-dark font-bold text-sm tracking-widest rounded-md px-8 py-3 inline-flex items-center gap-2">
                    + SUBMIT YOUR CAR
                </button>
            </div>
        </div>
    </div>
</x-layouts.public>
