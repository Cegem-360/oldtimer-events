<nav class="sticky top-0 z-50 bg-brand-green shadow-lg font-sans" x-data="{ menuOpen: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0">
                <img src="{{ Vite::asset('resources/images/oldtimer-events-logo.webp') }}" alt="Oldtimer Events" class="h-14 w-auto">
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-6">
                @php
                    $navLinks = [
                        ['route' => 'events.index', 'label' => 'Events'],
                        ['route' => 'map', 'label' => 'Map'],
                        ['route' => 'museums', 'label' => 'Museums'],
                        ['route' => 'garage', 'label' => 'The Garage'],
                        ['route' => 'membership', 'label' => 'Membership'],
                    ];
                @endphp

                @foreach ($navLinks as $link)
                    <a href="{{ route($link['route']) }}"
                       class="pb-0.5 transition-colors hover:text-amber-300 text-sm font-medium tracking-wider {{ request()->routeIs($link['route'] . '*') ? 'text-brand-gold-dark border-b-2 border-brand-gold-dark' : 'text-gray-200 border-b-2 border-transparent' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <a href="{{ route('login') }}"
                   class="px-4 py-1.5 rounded border border-brand-gold-dark text-brand-gold-dark font-semibold text-sm tracking-wider transition-all hover:bg-amber-400/20">
                    Login
                </a>
            </div>

            {{-- Mobile menu button --}}
            <button class="md:hidden p-2 rounded text-brand-gold-dark" @click="menuOpen = !menuOpen">
                <svg x-show="!menuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="menuOpen" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="menuOpen" x-cloak class="md:hidden bg-brand-green-dark border-t border-green-800 px-4 pb-4">
        @foreach ($navLinks as $link)
            <a href="{{ route($link['route']) }}"
               class="block py-2.5 border-b border-green-800/50 font-medium text-[0.9rem] {{ request()->routeIs($link['route'] . '*') ? 'text-brand-gold-dark' : 'text-gray-200' }}">
                {{ $link['label'] }}
            </a>
        @endforeach
        <a href="{{ route('login') }}"
           class="inline-block mt-3 px-4 py-1.5 rounded border border-brand-gold-dark text-brand-gold-dark font-semibold text-sm">
            Login
        </a>
    </div>
</nav>
