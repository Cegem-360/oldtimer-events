<x-layouts.public title="Submit Event">
    <div class="bg-brand-parchment min-h-screen" x-data="{ step: 0, submitted: false }">
        {{-- Success State --}}
        <div x-show="submitted" x-cloak class="min-h-screen flex items-center justify-center">
            <div class="text-center max-w-md">
                <div class="w-16 h-16 bg-gold-gradient rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-7 h-7 text-brand-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                </div>
                <h2 class="font-serif text-brand-dark font-bold text-3xl mb-3">Event Submitted!</h2>
                <p class="text-brand-muted leading-relaxed">Your event listing is under review. We'll notify you once it's approved and live on the platform.</p>
                <button @click="submitted = false; step = 0" class="bg-gold-gradient text-brand-dark font-bold text-sm tracking-wider rounded-md px-8 py-3 mt-6">
                    ADD ANOTHER EVENT
                </button>
            </div>
        </div>

        {{-- Form --}}
        <div x-show="!submitted">
            {{-- Header --}}
            <div class="bg-brand-green px-4 py-8">
                <div class="max-w-3xl mx-auto">
                    <h1 class="font-serif text-gold-gradient font-bold text-3xl mb-5">Submit Your Event</h1>
                    {{-- Progress Steps --}}
                    <div class="flex items-center gap-0">
                        @foreach (['Basic Info', 'Media', 'Listing Type'] as $i => $label)
                            <div class="flex items-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold"
                                         :class="{
                                            'bg-gold-gradient text-brand-dark': step > {{ $i }},
                                            'bg-white border-2 border-brand-gold-dark text-brand-gold-dark': step === {{ $i }},
                                            'bg-white/20 text-white/50': step < {{ $i }}
                                         }">
                                        <span x-show="step > {{ $i }}">&#10003;</span>
                                        <span x-show="step <= {{ $i }}">{{ $i + 1 }}</span>
                                    </div>
                                    <span class="text-[0.72rem] mt-1 whitespace-nowrap"
                                          :class="step === {{ $i }} ? 'text-white font-semibold' : 'text-white/50'">{{ $label }}</span>
                                </div>
                                @if ($i < 2)
                                    <div class="h-0.5 w-20 mb-5 mx-1"
                                         :class="step > {{ $i }} ? 'bg-brand-gold-dark' : 'bg-white/20'"></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="max-w-3xl mx-auto px-4 py-8">
                {{-- Step 1: Basic Info --}}
                <div x-show="step === 0" class="bg-white border border-brand-border rounded-xl p-8">
                    <h2 class="font-serif text-brand-dark font-bold text-2xl mb-6">Basic Information</h2>
                    <div class="grid grid-cols-1 gap-5">
                        <div>
                            <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">EVENT TITLE *</label>
                            <input type="text" placeholder="e.g. The Riviera Grand Tour 2025"
                                   class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                        </div>
                        <div>
                            <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">SHORT DESCRIPTION *</label>
                            <input type="text" placeholder="One-line summary of the event"
                                   class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                        </div>
                        <div>
                            <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">FULL DESCRIPTION</label>
                            <textarea rows="4" placeholder="Describe your event in detail..."
                                      class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none resize-y focus:border-brand-gold-dark"></textarea>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">CATEGORY *</label>
                                <select class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none">
                                    @foreach (['Rally', 'Concours', 'Museum', 'Auction', 'Other'] as $c)
                                        <option>{{ $c }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">EVENT DATE *</label>
                                <input type="date" class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">COUNTRY *</label>
                                <input type="text" placeholder="e.g. France"
                                       class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                            </div>
                            <div>
                                <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">CITY / REGION</label>
                                <input type="text" placeholder="e.g. Nice, Côte d'Azur"
                                       class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                            </div>
                        </div>
                        <div>
                            <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">GPS COORDINATES</label>
                            <input type="text" placeholder="43.7102, 7.2620"
                                   class="w-full border border-brand-border rounded-md px-3.5 py-2.5 text-brand-dark text-sm bg-brand-parchment outline-none focus:border-brand-gold-dark">
                        </div>
                    </div>
                </div>

                {{-- Step 2: Media --}}
                <div x-show="step === 1" x-cloak class="bg-white border border-brand-border rounded-xl p-8">
                    <h2 class="font-serif text-brand-dark font-bold text-2xl mb-6">Upload Media</h2>
                    <div class="border-2 border-dashed border-brand-gold-dark/40 rounded-[10px] px-8 py-12 text-center bg-brand-parchment mb-6 cursor-pointer hover:border-amber-400 transition-colors">
                        <svg class="w-9 h-9 text-brand-gold-dark mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                        <p class="text-brand-dark font-semibold mb-1">Drag & drop photos here</p>
                        <p class="text-brand-muted text-sm">or click to browse &middot; Max 5 photos &middot; JPG, PNG</p>
                    </div>
                    <div>
                        <label class="block text-brand-muted font-semibold text-xs tracking-wider mb-1.5">HERO IMAGE SELECTION</label>
                        <p class="text-brand-muted text-sm">After uploading, select which photo will be used as the main event image.</p>
                        <div class="flex gap-3 mt-3">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="w-20 h-[60px] bg-brand-parchment rounded-md flex items-center justify-center cursor-pointer
                                    {{ $i === 0 ? 'border-2 border-brand-gold-dark' : 'border-2 border-brand-border' }}">
                                    <span class="text-brand-muted text-[0.65rem]">Photo {{ $i + 1 }}</span>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Step 3: Listing Type --}}
                <div x-show="step === 2" x-cloak class="bg-white border border-brand-border rounded-xl p-8">
                    <h2 class="font-serif text-brand-dark font-bold text-2xl mb-6">Choose Listing Type</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ([
                            ['name' => 'Standard Listing', 'price' => 'Free', 'desc' => 'Get your event listed in our calendar with basic details.', 'features' => ['Event listing in calendar', 'Category & date filters', 'Contact info display'], 'highlight' => false, 'cta' => 'SELECT FREE LISTING'],
                            ['name' => 'Premium Featured', 'price' => '€99/mo', 'desc' => 'Maximum visibility — homepage placement, gold badge, top of search.', 'features' => ['Homepage featured section', 'Gold border & ★ badge', 'Top of search results', 'Featured in newsletter', 'Priority support'], 'highlight' => true, 'cta' => 'PROCEED TO CHECKOUT'],
                        ] as $tier)
                            <div class="border-2 rounded-[10px] p-6 relative
                                {{ $tier['highlight'] ? 'border-brand-gold-dark bg-brand-gold-dark/[0.04]' : 'border-brand-border' }}">
                                @if ($tier['highlight'])
                                    <div class="absolute -top-2.5 left-1/2 -translate-x-1/2 bg-gold-gradient text-brand-dark font-bold text-[0.65rem] tracking-widest rounded-full px-3 py-0.5">MOST POPULAR</div>
                                @endif
                                <h4 class="text-brand-dark font-bold mb-1">{{ $tier['name'] }}</h4>
                                <p class="text-brand-gold-dark font-bold text-2xl mb-2">{{ $tier['price'] }}</p>
                                <p class="text-brand-muted text-sm leading-relaxed mb-4">{{ $tier['desc'] }}</p>
                                @foreach ($tier['features'] as $f)
                                    <div class="flex items-center gap-2 mb-1">
                                        <span class="text-brand-gold-dark text-sm shrink-0">&#10003;</span>
                                        <span class="text-brand-dark text-xs">{{ $f }}</span>
                                    </div>
                                @endforeach
                                <button @click="submitted = true"
                                        class="w-full font-bold text-sm tracking-wider rounded-md py-3 mt-5
                                        {{ $tier['highlight'] ? 'bg-gold-gradient text-brand-dark' : 'bg-transparent border border-brand-gold-dark text-brand-gold-dark' }}">
                                    {{ $tier['cta'] }}
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Navigation --}}
                <div class="flex justify-between mt-6">
                    <button x-show="step > 0" @click="step = Math.max(0, step - 1)"
                            class="border border-brand-border rounded-md px-6 py-2.5 text-brand-muted font-semibold text-sm">
                        &larr; Back
                    </button>
                    <button x-show="step < 2" @click="step = Math.min(2, step + 1)"
                            class="bg-gold-gradient text-brand-dark font-bold text-sm tracking-wider rounded-md px-7 py-2.5 ml-auto flex items-center gap-1.5">
                        Continue
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>
