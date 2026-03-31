<x-layouts.public title="Events">
    {{-- Page Header --}}
    <div class="bg-brand-green px-4 pt-10 pb-8">
        <div class="max-w-7xl mx-auto">
            <h1 class="font-serif text-gold-gradient font-bold text-4xl tracking-wider uppercase">Event Calendar</h1>
            <div class="gold-divider w-[70px] mt-1.5"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-8" x-data="{ sidebarOpen: true }">
        <div class="flex gap-8">
            {{-- Sidebar Filters --}}
            <aside x-show="sidebarOpen" class="hidden lg:block w-[260px] min-w-[260px] shrink-0 transition-all">
                <form method="GET" action="{{ route('events.index') }}"
                      class="bg-white border border-brand-border rounded-[10px] p-6 sticky top-20">
                    <h3 class="text-brand-dark font-bold text-xs tracking-widest mb-5">FILTERS</h3>

                    {{-- Category --}}
                    <div class="mb-5">
                        <p class="text-brand-muted font-semibold text-xs tracking-wider mb-2">CATEGORY</p>
                        @foreach ($categories as $cat)
                            <label class="flex items-center gap-2 mb-2 cursor-pointer">
                                <input type="radio" name="category" value="{{ $cat }}"
                                       {{ request('category') === $cat ? 'checked' : '' }}
                                       class="accent-brand-gold-dark w-[15px] h-[15px]"
                                       onchange="this.form.submit()">
                                <span class="text-brand-dark text-sm">{{ $cat }}</span>
                                @php
                                    $catColors = ['Rally' => '#556B2F', 'Concours' => '#D1A93B', 'Museum' => '#6B7280', 'Auction' => '#9B1C1C', 'Other' => '#5A5A4E'];
                                @endphp
                                <span class="w-2 h-2 rounded-full ml-auto" style="background-color: {{ $catColors[$cat] ?? '#5A5A4E' }}"></span>
                            </label>
                        @endforeach
                    </div>

                    {{-- Country --}}
                    <div class="mb-5">
                        <p class="text-brand-muted font-semibold text-xs tracking-wider mb-2">COUNTRY</p>
                        <select name="country" onchange="this.form.submit()"
                                class="w-full border border-brand-border rounded-md px-3 py-2 text-brand-dark text-sm bg-brand-parchment outline-none">
                            <option value="">All Countries</option>
                            @foreach ($countries as $c)
                                <option value="{{ $c }}" {{ request('country') === $c ? 'selected' : '' }}>{{ $c }}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Sort --}}
                    <div class="mb-4">
                        <p class="text-brand-muted font-semibold text-xs tracking-wider mb-2">SORT BY</p>
                        @foreach (['date' => 'By Date', 'featured' => 'Featured First'] as $val => $label)
                            <label class="flex items-center gap-2 mb-2 cursor-pointer">
                                <input type="radio" name="sort" value="{{ $val }}"
                                       {{ request('sort', 'date') === $val ? 'checked' : '' }}
                                       class="accent-brand-gold-dark"
                                       onchange="this.form.submit()">
                                <span class="text-brand-dark text-sm">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>

                    <a href="{{ route('events.index') }}" class="text-brand-gold-dark text-xs font-semibold hover:underline">Reset Filters</a>
                </form>
            </aside>

            {{-- Main Timeline --}}
            <div class="flex-1">
                <div class="flex items-center justify-between mb-6">
                    <p class="text-brand-muted text-sm">
                        <span class="text-brand-gold-dark font-bold">{{ $events->total() }}</span> events found
                    </p>
                    <button @click="sidebarOpen = !sidebarOpen" class="hidden lg:flex items-center gap-1 text-brand-muted text-sm hover:text-amber-700">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                        <span x-text="sidebarOpen ? 'Hide Filters' : 'Show Filters'"></span>
                    </button>
                </div>

                {{-- Timeline --}}
                <div class="relative">
                    <div class="absolute left-0 top-0 bottom-0 w-0.5 bg-gold-gradient opacity-60 hidden md:block"></div>

                    @foreach ($events as $event)
                        <div class="flex gap-0 md:gap-8 mb-10">
                            {{-- Timeline node --}}
                            <div class="hidden md:flex flex-col items-center w-0.5 mt-3">
                                <div class="w-4 h-4 rounded-full bg-gold-gradient border-2 border-brand-parchment shadow-[0_0_0_2px_#D1A93B] z-[1] -ml-[7px]"></div>
                            </div>

                            {{-- Card --}}
                            <div class="flex-1 bg-white rounded-[10px] overflow-hidden flex flex-col sm:flex-row
                                {{ $event->featured ? 'border-2 border-brand-gold-dark shadow-[0_4px_20px_rgba(209,169,59,0.12)]' : 'border border-brand-border shadow-sm' }}">
                                {{-- Photo --}}
                                <div class="relative sm:w-64 h-48 sm:h-auto shrink-0 overflow-hidden">
                                    <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                                    @if ($event->featured)
                                        <div class="absolute top-2 left-2 bg-gold-gradient text-brand-dark font-bold text-[0.65rem] tracking-widest rounded px-2 py-0.5 flex items-center gap-1">
                                            &#9733; FEATURED
                                        </div>
                                    @endif
                                    <div class="absolute bottom-2 left-2 text-white font-semibold text-[0.65rem] tracking-widest rounded-full px-2 py-0.5"
                                         style="background-color: {{ $event->category_color }};">
                                        {{ strtoupper($event->category) }}
                                    </div>
                                </div>

                                {{-- Info --}}
                                <div class="p-5 flex flex-col justify-center flex-1">
                                    <div class="text-brand-gold-dark font-bold text-xl tracking-wide">{{ $event->date_display }}</div>
                                    <h3 class="font-serif text-brand-dark font-bold text-xl leading-tight mb-1">{{ $event->title }}</h3>
                                    <p class="text-brand-muted text-xs mb-2">
                                        &#128205; {{ $event->location }} &middot; {{ $event->country }}
                                        @if ($event->distance) &middot; {{ $event->distance }} @endif
                                    </p>
                                    <p class="text-brand-muted text-sm leading-relaxed mb-4 line-clamp-2">{{ $event->description }}</p>
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('events.show', $event->slug) }}"
                                           class="inline-block bg-gold-gradient text-brand-dark font-bold text-xs tracking-widest rounded px-5 py-2 transition-opacity hover:opacity-90">
                                            ENTER NOW
                                        </a>
                                        @if ($event->price)
                                            <span class="text-brand-muted text-sm font-medium">from {{ $event->price }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if ($events->isEmpty())
                        <div class="text-center py-16">
                            <p class="text-brand-muted">No events match your filters.</p>
                        </div>
                    @endif
                </div>

                {{-- Pagination --}}
                <div class="mt-8">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>
