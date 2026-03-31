<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
</head>
<body class="bg-[#1a1a18] font-sans antialiased" x-data="{ activeSection: 'dashboard', approved: [], rejected: [] }">
    <div class="min-h-screen flex">
        {{-- Dark Sidebar --}}
        <aside class="hidden md:flex w-[220px] bg-[#111110] border-r border-white/[0.08] flex-col shrink-0">
            <div class="px-5 py-4 border-b border-white/[0.08]">
                <p class="text-brand-gold-dark font-bold text-[0.7rem] tracking-[0.15em]">ADMIN PANEL</p>
                <p class="text-white/40 text-[0.68rem]">Oldtimer Events</p>
            </div>
            <nav class="flex-1 py-3">
                @foreach ([
                    ['id' => 'dashboard', 'label' => 'Dashboard'],
                    ['id' => 'users', 'label' => 'Users'],
                    ['id' => 'events', 'label' => 'Events'],
                    ['id' => 'subscriptions', 'label' => 'Subscriptions'],
                    ['id' => 'featured', 'label' => 'Featured Ads'],
                    ['id' => 'content', 'label' => 'Content'],
                ] as $item)
                    <button @click="activeSection = '{{ $item['id'] }}'"
                            class="flex items-center gap-2.5 w-full px-5 py-2.5 text-sm transition-colors hover:bg-white/5"
                            :class="activeSection === '{{ $item['id'] }}' ? 'bg-brand-gold-dark/[0.12] border-l-[3px] border-brand-gold-dark text-brand-gold-dark font-semibold' : 'border-l-[3px] border-transparent text-white/55'">
                        {{ $item['label'] }}
                    </button>
                @endforeach
            </nav>
            <div class="px-5 py-4 border-t border-white/[0.08] text-white/30 text-[0.72rem]">
                Admin: super@oldtimerevents.com
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1 overflow-auto">
            {{-- Top bar --}}
            <div class="bg-[#111110] border-b border-white/[0.08] px-6 py-3.5 flex items-center justify-between">
                <h2 class="font-serif text-gold-gradient font-bold text-xl" x-text="activeSection.charAt(0).toUpperCase() + activeSection.slice(1)">Dashboard</h2>
                <div class="text-white/40 text-xs">{{ now()->format('l, d F Y') }}</div>
            </div>

            <div class="p-6">
                {{-- Stats --}}
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    @foreach ([
                        ['label' => 'Total Active Events', 'value' => '284', 'change' => '+12 this week', 'up' => true],
                        ['label' => 'Monthly Revenue', 'value' => '€4,830', 'change' => '+18% vs last month', 'up' => true],
                        ['label' => 'New Registrations', 'value' => '47', 'change' => '+8 this week', 'up' => true],
                        ['label' => 'Pending Approvals', 'value' => '9', 'change' => '3 urgent', 'up' => false],
                    ] as $s)
                        <div class="bg-[#111110] border border-white/[0.08] rounded-[10px] p-5">
                            <p class="text-white/40 text-[0.72rem] font-semibold tracking-widest uppercase mb-2">{{ $s['label'] }}</p>
                            <p class="font-serif text-white font-bold text-3xl leading-none">{{ $s['value'] }}</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="text-[0.72rem] {{ $s['up'] ? 'text-green-500' : 'text-red-500' }}">
                                    {{ $s['up'] ? '&#9650;' : '&#9660;' }} {{ $s['change'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Revenue Chart --}}
                <div class="bg-[#111110] border border-white/[0.08] rounded-[10px] p-6 mb-6">
                    <h3 class="text-brand-gold-dark font-semibold text-xs tracking-widest mb-4">MONTHLY REVENUE & EVENTS</h3>
                    <div class="flex items-end gap-3 h-[180px]">
                        @foreach ([
                            ['month' => 'Jan', 'revenue' => 30, 'events' => 18],
                            ['month' => 'Feb', 'revenue' => 45, 'events' => 24],
                            ['month' => 'Mar', 'revenue' => 65, 'events' => 32],
                            ['month' => 'Apr', 'revenue' => 55, 'events' => 28],
                            ['month' => 'May', 'revenue' => 95, 'events' => 42],
                            ['month' => 'Jun', 'revenue' => 85, 'events' => 38],
                        ] as $d)
                            <div class="flex-1 flex flex-col items-center gap-1">
                                <div class="w-full flex gap-1 items-end justify-center" style="height: 150px;">
                                    <div class="w-3 bg-brand-gold-dark rounded-t" style="height: {{ $d['revenue'] }}%;"></div>
                                    <div class="w-3 bg-brand-green-light rounded-t" style="height: {{ $d['events'] * 2.5 }}%;"></div>
                                </div>
                                <span class="text-white/40 text-[0.68rem]">{{ $d['month'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Pending Approvals --}}
                <div class="bg-[#111110] border border-white/[0.08] rounded-[10px] overflow-hidden">
                    <div class="px-5 py-4 border-b border-white/[0.08] flex items-center justify-between">
                        <h3 class="text-white font-bold font-serif">Pending Event Approvals</h3>
                        <span class="bg-brand-gold-dark/15 text-brand-gold-dark font-bold text-[0.7rem] rounded-full px-2.5 py-0.5">{{ $events->count() }} pending</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-white/[0.03]">
                                    @foreach (['Event', 'Submitter', 'Submitted', 'Category', 'Actions'] as $h)
                                        <th class="px-4 py-2.5 text-left text-white/40 font-semibold text-[0.7rem] tracking-widest">{{ strtoupper($h) }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="border-b border-white/5 hover:bg-white/[0.02]">
                                        <td class="px-4 py-3.5">
                                            <p class="text-white font-semibold text-sm">{{ $event->title }}</p>
                                            <p class="text-white/40 text-[0.72rem]">{{ $event->location }}</p>
                                        </td>
                                        <td class="px-4 py-3.5 text-white/55 text-xs">organiser@example.com</td>
                                        <td class="px-4 py-3.5 text-white/40 text-xs">2 days ago</td>
                                        <td class="px-4 py-3.5">
                                            <span class="bg-white/[0.07] text-white/70 text-[0.65rem] font-semibold tracking-wider rounded-full px-2 py-0.5">
                                                {{ strtoupper($event->category) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3.5">
                                            <div class="flex items-center gap-2">
                                                <template x-if="approved.includes({{ $event->id }})">
                                                    <span class="text-green-500 text-xs font-semibold">&#10003; Approved</span>
                                                </template>
                                                <template x-if="rejected.includes({{ $event->id }})">
                                                    <span class="text-red-500 text-xs font-semibold">&#10007; Rejected</span>
                                                </template>
                                                <template x-if="!approved.includes({{ $event->id }}) && !rejected.includes({{ $event->id }})">
                                                    <div class="flex items-center gap-2">
                                                        <button @click="approved.push({{ $event->id }})"
                                                                class="bg-green-900/50 text-green-500 rounded px-2.5 py-1 text-[0.72rem] font-bold flex items-center gap-1">
                                                            &#10003; Approve
                                                        </button>
                                                        <button @click="rejected.push({{ $event->id }})"
                                                                class="bg-red-900/50 text-red-500 rounded px-2.5 py-1 text-[0.72rem] font-bold flex items-center gap-1">
                                                            &#10007; Reject
                                                        </button>
                                                    </div>
                                                </template>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
