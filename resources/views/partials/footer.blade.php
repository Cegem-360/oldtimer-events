<footer class="bg-brand-green-dark font-sans border-t border-green-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Logo & Description --}}
            <div class="lg:col-span-2">
                <div class="flex items-center gap-2 mb-3">
                    <span class="font-serif text-xl tracking-wide text-gold-gradient font-bold">OLDTIMER EVENTS</span>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed mb-4 max-w-sm">
                    Europe's premier directory for classic car & motorcycle events, rallies, concours, auctions, clubs and museums.
                </p>
                <div class="flex gap-3">
                    @foreach (['facebook', 'twitter', 'instagram', 'youtube'] as $social)
                        <a href="#" class="p-2 rounded border border-brand-gold-dark/25 text-brand-gold-dark transition-all hover:bg-amber-400/20">
                            <svg class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="1.5"/></svg>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="text-brand-gold-dark font-semibold tracking-widest text-xs mb-4">QUICK LINKS</h4>
                @php
                    $footerLinks = [
                        ['route' => 'events.index', 'label' => 'Event Calendar'],
                        ['route' => 'map', 'label' => 'Explore the Map'],
                        ['route' => 'museums', 'label' => 'Museums'],
                        ['route' => 'garage', 'label' => 'The Garage'],
                        ['route' => 'membership', 'label' => 'Membership'],
                    ];
                @endphp
                @foreach ($footerLinks as $link)
                    <a href="{{ route($link['route']) }}" class="block text-gray-400 text-sm mb-2 hover:text-amber-300 transition-colors">{{ $link['label'] }}</a>
                @endforeach
            </div>

            {{-- Newsletter --}}
            <div>
                <h4 class="text-brand-gold-dark font-semibold tracking-widest text-xs mb-4">NEWSLETTER</h4>
                <p class="text-gray-400 text-sm mb-3">Weekly event alerts and classic car news.</p>
                <div class="flex flex-col gap-2">
                    <input type="email" placeholder="your@email.com"
                           class="w-full bg-white/[0.07] border border-brand-gold-dark/25 text-white text-sm px-3 py-2 rounded-md outline-none focus:border-brand-gold-dark">
                    <button class="w-full bg-gold-gradient text-brand-dark font-semibold text-xs tracking-wider rounded-md py-2">SUBSCRIBE</button>
                </div>
            </div>
        </div>

        <div class="border-t border-brand-gold-dark/20 mt-8 pt-6 flex flex-col sm:flex-row justify-between items-center gap-3">
            <p class="text-gray-500 text-xs">&copy; {{ date('Y') }} Oldtimer Events. All rights reserved.</p>
            <div class="flex gap-4">
                @foreach (['About Us', 'Contact', 'Privacy Policy', 'Terms & Conditions'] as $item)
                    <a href="#" class="text-gray-500 text-xs hover:text-amber-300 transition-colors">{{ $item }}</a>
                @endforeach
            </div>
        </div>
    </div>
</footer>
