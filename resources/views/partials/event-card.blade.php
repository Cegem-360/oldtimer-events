@props(['event'])

<div class="flex flex-col h-full group transition-all hover:-translate-y-1 hover:shadow-lg rounded-xl overflow-hidden relative
    {{ $event->featured ? 'border-2 border-brand-gold-dark shadow-[0_4px_24px_rgba(209,169,59,0.15)]' : 'border border-brand-border shadow-sm' }}"
    style="background-color: #fff;">

    {{-- Featured ribbon --}}
    @if ($event->featured)
        <div class="absolute top-3 right-[-8px] z-10 bg-gold-gradient text-brand-dark font-bold text-[0.65rem] tracking-widest px-4 pl-2 py-0.5"
             style="clip-path: polygon(0 0, 100% 0, 88% 100%, 0 100%);">
            &#9733; FEATURED
        </div>
    @endif

    {{-- Photo --}}
    <div class="relative overflow-hidden h-48">
        <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        {{-- Date badge --}}
        <div class="absolute bottom-2.5 left-2.5 bg-gold-gradient text-brand-dark font-bold text-xs tracking-wide rounded px-2.5 py-0.5">
            {{ $event->date_display }}
        </div>
        {{-- Category pill --}}
        <div class="absolute top-2.5 left-2.5 text-white font-semibold text-[0.65rem] tracking-widest rounded-full px-2.5 py-0.5"
             style="background-color: {{ $event->category_color }};">
            {{ strtoupper($event->category) }}
        </div>
    </div>

    {{-- Content --}}
    <div class="flex flex-col flex-1 p-4">
        <h3 class="font-serif text-brand-dark font-bold text-xl leading-tight mb-1">{{ $event->title }}</h3>
        <div class="flex items-center gap-1 mb-2">
            <svg class="w-3 h-3 text-brand-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="text-brand-muted text-xs">{{ $event->location }}</span>
        </div>
        <p class="text-brand-muted text-sm leading-relaxed mb-4 flex-1 line-clamp-2">{{ $event->description }}</p>
        <a href="{{ route('events.show', $event->slug) }}"
           class="inline-block text-center border border-brand-gold-dark text-brand-gold-dark font-semibold text-xs tracking-widest rounded px-4 py-1.5 transition-all hover:bg-amber-400/10 mt-auto">
            VIEW EVENT
        </a>
    </div>
</div>
