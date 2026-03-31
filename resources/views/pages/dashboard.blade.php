<x-layouts.public title="Dashboard">
    @php
        $statuses = ['Live', 'Featured', 'Draft', 'Pending', 'Live', 'Expired'];
        $views = [1240, 3890, 520, 180, 2100, 890];
        $statusColors = [
            'Live' => ['bg' => '#dcfce7', 'text' => '#15803d'],
            'Draft' => ['bg' => '#f3f4f6', 'text' => '#6b7280'],
            'Pending' => ['bg' => '#fef3c7', 'text' => '#d97706'],
            'Expired' => ['bg' => '#fee2e2', 'text' => '#dc2626'],
            'Featured' => ['bg' => 'rgba(209,169,59,0.15)', 'text' => '#D1A93B'],
        ];
    @endphp

    {{-- Welcome Banner --}}
    <div class="bg-brand-green px-4 py-5">
        <div class="max-w-7xl mx-auto flex items-center justify-between">
            <div>
                <p class="text-white/60 text-xs tracking-widest">WELCOME BACK</p>
                <h1 class="font-serif text-gold-gradient font-bold text-2xl">James Thornton</h1>
            </div>
            <a href="{{ route('events.create') }}"
               class="bg-gold-gradient text-brand-dark font-bold text-sm tracking-wider rounded-md px-5 py-2.5 flex items-center gap-1.5">
                + ADD NEW EVENT
            </a>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-6 flex gap-6" x-data="{ activeTab: 'overview' }">
        {{-- Sidebar --}}
        <aside class="hidden md:block w-52 shrink-0">
            <div class="bg-white border border-brand-border rounded-[10px] overflow-hidden">
                @foreach ([
                    ['id' => 'overview', 'label' => 'Overview'],
                    ['id' => 'events', 'label' => 'My Events'],
                    ['id' => 'subscriptions', 'label' => 'Subscriptions'],
                    ['id' => 'settings', 'label' => 'Settings'],
                ] as $item)
                    <button @click="activeTab = '{{ $item['id'] }}'"
                            class="flex items-center gap-2.5 w-full px-5 py-3.5 text-sm transition-colors hover:bg-amber-50"
                            :class="activeTab === '{{ $item['id'] }}' ? 'bg-brand-gold-dark/10 border-l-[3px] border-brand-gold-dark text-brand-gold-dark font-semibold' : 'border-l-[3px] border-transparent text-brand-muted'">
                        {{ $item['label'] }}
                    </button>
                @endforeach
                <button class="flex items-center gap-2.5 w-full px-5 py-3.5 text-sm text-red-600 border-t border-brand-border mt-2">
                    Logout
                </button>
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1">
            {{-- Stats --}}
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                @foreach ([
                    ['label' => 'Active Events', 'value' => '4', 'change' => '+1 this month'],
                    ['label' => 'Views This Month', 'value' => '8,720', 'change' => '+23% vs last month'],
                    ['label' => 'Upcoming Renewals', 'value' => '2', 'change' => 'Next: Jun 1, 2025'],
                    ['label' => 'Featured Active', 'value' => '2', 'change' => 'Premium plan'],
                ] as $stat)
                    <div class="bg-white border border-brand-border rounded-[10px] p-5">
                        <span class="text-brand-muted text-[0.75rem] font-semibold tracking-wider uppercase">{{ $stat['label'] }}</span>
                        <p class="font-serif text-brand-dark font-bold text-3xl leading-none mt-2 mb-1">{{ $stat['value'] }}</p>
                        <p class="text-brand-muted text-[0.72rem]">{{ $stat['change'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Events Table --}}
            <div class="bg-white border border-brand-border rounded-[10px] overflow-hidden">
                <div class="px-6 py-4 border-b border-brand-border flex items-center justify-between">
                    <h3 class="text-brand-dark font-bold font-serif">My Events</h3>
                    <a href="{{ route('events.create') }}" class="text-brand-gold-dark text-xs font-semibold hover:underline flex items-center gap-1">+ Add New</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-brand-parchment">
                                @foreach (['Event', 'Status', 'Date', 'Views', 'Actions'] as $h)
                                    <th class="px-4 py-3 text-left text-brand-muted font-semibold text-[0.75rem] tracking-wider">{{ strtoupper($h) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $i => $event)
                                @php
                                    $status = $statuses[$i] ?? 'Live';
                                    $sc = $statusColors[$status];
                                @endphp
                                <tr class="border-b border-brand-border hover:bg-amber-50/30 transition-colors">
                                    <td class="px-4 py-3.5">
                                        <p class="text-brand-dark font-semibold text-sm">{{ $event->title }}</p>
                                        <p class="text-brand-muted text-xs">{{ $event->location }}</p>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <span class="font-bold text-[0.65rem] tracking-widest rounded-full px-2.5 py-1"
                                              style="background-color: {{ $sc['bg'] }}; color: {{ $sc['text'] }};">
                                            {{ strtoupper($status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5 text-brand-muted text-sm">{{ $event->date_display }}</td>
                                    <td class="px-4 py-3.5">
                                        <span class="text-brand-dark font-semibold text-sm">{{ number_format($views[$i] ?? 0) }}</span>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('events.show', $event->slug) }}" class="text-brand-muted hover:text-amber-700" title="View">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                            </a>
                                            <a href="{{ route('events.create') }}" class="text-brand-muted hover:text-amber-700" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                            </a>
                                            <button class="text-red-600 hover:opacity-70" title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Subscription Panel --}}
            <div class="bg-white border-2 border-brand-gold-dark rounded-[10px] p-6 mt-6">
                <h3 class="text-brand-dark font-bold font-serif mb-1">Current Subscription</h3>
                <div class="flex items-center justify-between flex-wrap gap-3">
                    <div>
                        <span class="bg-gold-gradient text-brand-dark font-bold text-[0.7rem] tracking-wider rounded px-2.5 py-1">&#9733; PREMIUM FEATURED</span>
                        <p class="text-brand-muted text-sm mt-1">Renews on <strong>July 1, 2025</strong> &middot; &euro;99/month</p>
                    </div>
                    <div class="flex gap-3">
                        <button class="border border-brand-border rounded-md px-4 py-2 text-brand-muted text-sm font-semibold">Manage Plan</button>
                        <button class="bg-gold-gradient text-brand-dark font-bold text-sm rounded-md px-4 py-2">Upgrade</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>
