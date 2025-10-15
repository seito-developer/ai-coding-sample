<x-layouts.app :title="__('Dashboard')">
    <section class="space-y-10">
        <div class="space-y-4">
            <span class="brand-tag">{{ __('Team Overview') }}</span>
            <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                <div class="space-y-4">
                    <h1 class="text-4xl font-semibold text-slate-800">{{ __('Welcome back, :name', ['name' => auth()->user()->first_name ?? auth()->user()->name]) }}</h1>
                    <p class="max-w-2xl text-base text-slate-500">
                        {{ __('Track performance, monitor goals, and celebrate wins with insights tailored to your workspace. Everything follows our refreshed palette for a cohesive look and feel.') }}
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <flux:link
                            :href="route('profile.edit')"
                            wire:navigate
                            class="inline-flex items-center justify-center rounded-[5px] bg-[#3261ab] px-5 py-2 text-sm font-semibold text-white shadow-elevated transition hover:bg-[#3261ab]/85"
                        >
                            {{ __('View profile') }}
                        </flux:link>
                        <flux:link
                            href="https://laravel.com/docs"
                            target="_blank"
                            class="inline-flex items-center justify-center rounded-[5px] border border-[#3261ab] px-5 py-2 text-sm font-semibold text-[#3261ab] transition hover:bg-[#3261ab]/10"
                        >
                            {{ __('Product tour') }}
                        </flux:link>
                    </div>
                </div>

                <div class="flex gap-6 text-right text-sm text-slate-500">
                    <div>
                        <p class="uppercase tracking-[0.18em]">{{ __('Active members') }}</p>
                        <p class="text-3xl font-semibold text-slate-800">58</p>
                        <p class="text-xs text-[#007fb1]">{{ __('+12% vs last month') }}</p>
                    </div>
                    <div>
                        <p class="uppercase tracking-[0.18em]">{{ __('Projects') }}</p>
                        <p class="text-3xl font-semibold text-slate-800">12</p>
                        <p class="text-xs text-[#007fb1]">{{ __('4 launching soon') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-3">
            @foreach ([
                ['label' => __('Weekly reach'), 'value' => '24.5K', 'trend' => '+8.2%', 'description' => __('Increase driven by scheduled campaigns.')],
                ['label' => __('Conversion rate'), 'value' => '4.2%', 'trend' => '+0.6%', 'description' => __('Improved onboarding keeps momentum strong.')],
                ['label' => __('Support satisfaction'), 'value' => '94%', 'trend' => '+3 pts', 'description' => __('Response time stays under 2h average.')],
            ] as $card)
                <div class="space-y-4 border border-slate-200 bg-white/85 p-6 shadow-[0px_18px_48px_rgba(50,97,171,0.12)]">
                    <p class="text-xs uppercase tracking-[0.28em] text-slate-400">{{ $card['label'] }}</p>
                    <p class="text-4xl font-semibold text-slate-800">{{ $card['value'] }}</p>
                    <p class="text-xs font-semibold text-[#007fb1]">{{ $card['trend'] }}</p>
                    <p class="text-sm text-slate-500">{{ $card['description'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="grid gap-6 lg:grid-cols-[2fr,1fr]">
            <div class="space-y-6 border border-slate-200 bg-white/85 p-6 shadow-[0px_18px_48px_rgba(50,97,171,0.12)]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs uppercase tracking-[0.28em] text-slate-400">{{ __('Performance pulse') }}</p>
                        <h2 class="text-2xl font-semibold text-slate-800">{{ __('Engagement timeline') }}</h2>
                    </div>
                    <flux:link
                        href="https://laravel.com/docs/starter-kits#livewire"
                        target="_blank"
                        class="inline-flex items-center justify-center rounded-[5px] border border-slate-200 px-4 py-2 text-xs font-semibold text-slate-600 transition hover:bg-[#3261ab]/10 hover:text-[#3261ab]"
                    >
                        {{ __('Export report') }}
                    </flux:link>
                </div>
                <div class="grid gap-4">
                    @foreach ([
                        ['title' => __('Kickoff sync'), 'time' => __('09:30'), 'status' => __('Completed'), 'accent' => '#3261ab'],
                        ['title' => __('Campaign review'), 'time' => __('13:00'), 'status' => __('In progress'), 'accent' => '#007fb1'],
                        ['title' => __('Feedback survey'), 'time' => __('16:15'), 'status' => __('Scheduled'), 'accent' => '#d8e212'],
                    ] as $event)
                        <div class="flex items-start justify-between border border-slate-100 bg-white/70 p-4 shadow-sm">
                            <div class="space-y-1">
                                <p class="text-sm font-semibold text-slate-800">{{ $event['title'] }}</p>
                                <p class="text-xs text-slate-500">{{ $event['status'] }}</p>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <span class="text-xs uppercase tracking-[0.24em] text-slate-400">{{ $event['time'] }}</span>
                                <span class="h-6 w-[3px]" style="background-color: {{ $event['accent'] }}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="space-y-6 border border-slate-200 bg-white/85 p-6 shadow-[0px_18px_48px_rgba(50,97,171,0.12)]">
                <div>
                    <p class="text-xs uppercase tracking-[0.28em] text-slate-400">{{ __('Team signals') }}</p>
                    <h2 class="text-2xl font-semibold text-slate-800">{{ __('Highlights') }}</h2>
                </div>
                <ul class="space-y-4 text-sm text-slate-500">
                    <li class="flex items-start justify-between gap-4">
                        <span>{{ __('Mobile app beta reached 1K sign-ups within 48 hours.') }}</span>
                        <span class="text-xs font-semibold text-[#007fb1]">{{ __('New') }}</span>
                    </li>
                    <li class="flex items-start justify-between gap-4">
                        <span>{{ __('Support satisfaction stayed above 92% for the third week in a row.') }}</span>
                        <span class="text-xs font-semibold text-[#3261ab]">{{ __('Stable') }}</span>
                    </li>
                    <li class="flex items-start justify-between gap-4">
                        <span>{{ __('Quarterly planning session scheduled for next Tuesday at 10:00.') }}</span>
                        <span class="text-xs font-semibold text-[#d8e212]">{{ __('Soon') }}</span>
                    </li>
                </ul>
                <flux:link
                    href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank"
                    class="inline-flex w-full items-center justify-center rounded-[5px] bg-[#3261ab] py-3 text-sm font-semibold text-white transition hover:bg-[#3261ab]/85"
                >
                    {{ __('Open project hub') }}
                </flux:link>
            </div>
        </div>
    </section>
</x-layouts.app>
