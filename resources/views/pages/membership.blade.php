<x-layouts.public title="Membership">
    {{-- Header --}}
    <div class="bg-brand-green px-4 py-14 text-center">
        <p class="text-brand-gold-dark font-semibold text-xs tracking-[0.2em] mb-2">PRICING & PLANS</p>
        <h1 class="font-serif text-gold-gradient font-bold uppercase mb-4" style="font-size: clamp(2rem, 5vw, 3.5rem);">Choose Your Membership</h1>
        <div class="gold-divider w-[70px] mx-auto mb-4"></div>
        <p class="text-white/70 text-[0.95rem] max-w-lg mx-auto">
            List your classic car events and reach thousands of enthusiasts across Europe. All plans include our moderation guarantee.
        </p>
    </div>

    {{-- Pricing Cards --}}
    <div class="bg-brand-parchment px-4 py-14">
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
            @php
                $tiers = [
                    [
                        'name' => 'Free Listing', 'price' => '€0', 'period' => 'forever',
                        'desc' => 'Get started with a basic event entry. Perfect for small local gatherings.',
                        'features' => ['Single event listing', 'Basic calendar placement', 'Event details & date', 'Contact information', 'Category tagging'],
                        'excluded' => ['Featured placement', 'Homepage visibility', 'Gold badge', 'Analytics dashboard', 'Priority support'],
                        'cta' => 'Get Started Free', 'highlight' => false,
                    ],
                    [
                        'name' => 'Normal Monthly', 'price' => '€29', 'period' => 'per month',
                        'desc' => 'Enhanced visibility for regular event organisers. Monthly rolling subscription.',
                        'features' => ['Up to 5 event listings', 'Enhanced listing style', 'Up to 8 photos per event', 'Location map embed', 'Basic analytics (views)', 'Email support'],
                        'excluded' => ['Homepage featured section', 'Gold ★ badge', 'Top of search results', 'Newsletter placement'],
                        'cta' => 'Subscribe', 'highlight' => false,
                    ],
                    [
                        'name' => 'Premium Featured', 'price' => '€99', 'period' => 'per month',
                        'desc' => 'Maximum exposure for flagship events. Gold badge, homepage placement, top of all search results.',
                        'features' => ['Unlimited event listings', 'Homepage featured carousel', 'Gold ★ FEATURED badge', 'Top of search results', 'Featured newsletter slot', 'Unlimited photos & gallery', 'Full analytics dashboard', 'Priority phone & email support', 'Stripe checkout integration'],
                        'excluded' => [],
                        'cta' => 'Go Premium', 'highlight' => true,
                    ],
                ];
            @endphp

            @foreach ($tiers as $tier)
                <div class="bg-white rounded-xl overflow-hidden relative
                    {{ $tier['highlight'] ? 'border-2 border-brand-gold-dark shadow-[0_8px_40px_rgba(209,169,59,0.2)] scale-[1.03]' : 'border border-brand-border shadow-sm' }}">
                    @if ($tier['highlight'])
                        <div class="bg-gold-gradient text-center py-2 text-brand-dark font-bold text-[0.72rem] tracking-[0.15em]">&#9733; MOST POPULAR</div>
                    @endif
                    <div class="p-8">
                        <h3 class="text-brand-dark font-bold text-base tracking-wide mb-1">{{ $tier['name'] }}</h3>
                        <div class="flex items-baseline gap-1 mb-2">
                            <span class="font-serif font-bold text-4xl leading-none {{ $tier['highlight'] ? 'text-brand-gold-dark' : 'text-brand-dark' }}">{{ $tier['price'] }}</span>
                            <span class="text-brand-muted text-xs">/{{ $tier['period'] }}</span>
                        </div>
                        <p class="text-brand-muted text-sm leading-relaxed mb-6">{{ $tier['desc'] }}</p>

                        <button class="w-full font-bold text-xs tracking-wider rounded-md py-3 mb-6 transition-opacity hover:opacity-90
                            {{ $tier['highlight'] ? 'bg-gold-gradient text-brand-dark' : 'bg-transparent border border-brand-gold-dark text-brand-gold-dark' }}">
                            {{ $tier['cta'] }}
                        </button>

                        <div class="border-t border-brand-border pt-5">
                            @foreach ($tier['features'] as $f)
                                <div class="flex items-start gap-2 mb-2">
                                    <span class="text-brand-gold-dark text-sm mt-0.5 shrink-0">&#10003;</span>
                                    <span class="text-brand-dark text-sm">{{ $f }}</span>
                                </div>
                            @endforeach
                            @foreach ($tier['excluded'] as $f)
                                <div class="flex items-start gap-2 mb-2">
                                    <span class="text-gray-300 text-sm mt-0.5">&#10007;</span>
                                    <span class="text-gray-300 text-sm">{{ $f }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="max-w-2xl mx-auto text-center mt-10">
            <p class="text-brand-muted text-sm leading-relaxed">
                &#128274; All payments are processed securely through <strong>Stripe</strong>. We never store your payment details. Cancel anytime &mdash; no long-term contracts, no hidden fees.
            </p>
        </div>
    </div>

    {{-- FAQ --}}
    <div class="bg-white px-4 py-14">
        <div class="max-w-3xl mx-auto">
            <h2 class="font-serif text-brand-dark font-bold text-3xl text-center mb-2">Frequently Asked Questions</h2>
            <div class="gold-divider w-16 mx-auto mb-10"></div>
            @php
                $faqs = [
                    ['q' => 'Can I cancel my subscription at any time?', 'a' => "Yes. Both Normal Monthly and Premium Featured are month-to-month and can be cancelled any time from your dashboard. Your listing will remain active until the end of the billing period."],
                    ['q' => 'How quickly will my event be listed?', 'a' => 'Free listings are reviewed within 48 hours. Normal and Premium listings are typically approved within 4–6 hours during business days.'],
                    ['q' => 'What payment methods do you accept?', 'a' => 'We use Stripe Checkout, which supports all major credit and debit cards, Apple Pay, Google Pay, and SEPA Direct Debit.'],
                    ['q' => 'Can I upgrade or downgrade my plan?', 'a' => 'Absolutely. You can change your plan at any time from the Organiser Dashboard. Upgrades take effect immediately; downgrades apply at the next billing cycle.'],
                ];
            @endphp
            <div class="grid gap-4">
                @foreach ($faqs as $faq)
                    <div class="border border-brand-border rounded-lg p-5">
                        <h4 class="text-brand-dark font-bold text-[0.92rem] mb-2">{{ $faq['q'] }}</h4>
                        <p class="text-brand-muted text-sm leading-relaxed">{{ $faq['a'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.public>
