<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen font-sans text-slate-800">
        <div class="relative flex min-h-screen flex-col overflow-hidden">
            <div class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-80 bg-gradient-to-b from-[#3261ab]/20 via-transparent to-transparent"></div>
            <div class="pointer-events-none absolute inset-y-0 -z-10 hidden w-[420px] bg-[radial-gradient(circle_at_top,#d8e212_0%,rgba(216,226,18,0)_70%)] lg:block"></div>

            <flux:sidebar
                sticky
                stashable
                class="border-e border-white/40 bg-white/85 px-6 py-8 shadow-[0_32px_80px_rgba(50,97,171,0.15)] backdrop-blur-2xl lg:px-8"
            >
                <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

                <div class="mb-8 flex items-center gap-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3" wire:navigate>
                        <x-app-logo class="h-10 w-auto" />
                    </a>
                </div>

                <div class="space-y-6">
                    <div class="space-y-4">
                        <span class="brand-tag">{{ __('Dashboard Suite') }}</span>
                        <div class="space-y-1">
                            <p class="text-sm font-semibold uppercase tracking-[0.14em] text-slate-500">{{ __('Navigation') }}</p>
                            <p class="text-sm text-slate-500">{{ __('Explore tools and insights tailored to your team.') }}</p>
                        </div>
                    </div>

                    <flux:navlist variant="outline" class="space-y-2">
                        <flux:navlist.group :heading="__('Platform')" class="grid gap-2">
                            <flux:navlist.item
                                icon="home"
                                :href="route('dashboard')"
                                :current="request()->routeIs('dashboard')"
                                class="rounded-[5px] bg-white/70 px-3 py-2 text-sm font-semibold text-slate-600 transition data-[current=true]:bg-[#3261ab] data-[current=true]:text-white hover:bg-[#3261ab]/10"
                                wire:navigate
                            >
                                {{ __('Dashboard') }}
                            </flux:navlist.item>
                        </flux:navlist.group>
                    </flux:navlist>
                </div>

                <flux:spacer />

                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.24em] text-slate-400">{{ __('Resources') }}</p>
                    <flux:navlist variant="outline" class="space-y-2">
                        <flux:navlist.item
                            icon="folder-git-2"
                            href="https://github.com/laravel/livewire-starter-kit"
                            target="_blank"
                            class="rounded-[5px] px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-[#3261ab]/10"
                        >
                            {{ __('Repository') }}
                        </flux:navlist.item>

                        <flux:navlist.item
                            icon="book-open-text"
                            href="https://laravel.com/docs/starter-kits#livewire"
                            target="_blank"
                            class="rounded-[5px] px-3 py-2 text-sm font-medium text-slate-600 transition hover:bg-[#3261ab]/10"
                        >
                            {{ __('Documentation') }}
                        </flux:navlist.item>
                    </flux:navlist>
                </div>

                <!-- Desktop User Menu -->
                <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                        icon:trailing="chevrons-up-down"
                        data-test="sidebar-menu-button"
                        class="rounded-[5px] bg-[#3261ab] px-3 py-2 text-white shadow-elevated"
                    />

                    <flux:menu class="w-[240px] border border-slate-100/70 bg-white/90 p-2 shadow-lg backdrop-blur-xl">
                        <flux:menu.radio.group>
                            <div class="bg-slate-50/80 p-3 text-sm font-normal">
                                <div class="flex items-center gap-3 text-start">
                                    <span class="relative flex h-10 w-10 shrink-0 overflow-hidden bg-[#3261ab]/10 text-[#3261ab]">
                                        <span class="flex h-full w-full items-center justify-center font-semibold">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item
                                :href="route('profile.edit')"
                                icon="cog"
                                class="rounded-[5px] text-slate-600 hover:bg-[#3261ab]/10 hover:text-[#3261ab]"
                                wire:navigate
                            >
                                {{ __('Settings') }}
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item
                                as="button"
                                type="submit"
                                icon="arrow-right-start-on-rectangle"
                                class="w-full rounded-[5px] text-slate-600 transition hover:bg-[#3261ab]/10 hover:text-[#3261ab]"
                                data-test="logout-button"
                            >
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:sidebar>

            <!-- Mobile User Menu -->
            <flux:header class="border-none bg-transparent px-6 pt-6 lg:hidden">
                <flux:sidebar.toggle class="rounded-[5px] border border-white/60 bg-white/70 p-2 shadow-sm" icon="bars-2" inset="left" />

                <flux:spacer />

                <flux:dropdown position="top" align="end">
                    <flux:profile
                        :initials="auth()->user()->initials()"
                        icon-trailing="chevron-down"
                        class="rounded-[5px] bg-[#3261ab] px-3 py-2 text-white"
                    />

                    <flux:menu class="w-56 border border-slate-100/70 bg-white/90 p-2 shadow-lg backdrop-blur-xl">
                        <flux:menu.radio.group>
                            <div class="bg-slate-50/80 p-3 text-sm font-normal">
                                <div class="flex items-center gap-3 text-start">
                                    <span class="relative flex h-9 w-9 shrink-0 overflow-hidden bg-[#3261ab]/10 text-[#3261ab]">
                                        <span class="flex h-full w-full items-center justify-center font-semibold">
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs text-slate-500">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item
                                :href="route('profile.edit')"
                                icon="cog"
                                class="rounded-[5px] text-slate-600 hover:bg-[#3261ab]/10 hover:text-[#3261ab]"
                                wire:navigate
                            >
                                {{ __('Settings') }}
                            </flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item
                                as="button"
                                type="submit"
                                icon="arrow-right-start-on-rectangle"
                                class="w-full rounded-[5px] text-slate-600 transition hover:bg-[#3261ab]/10 hover:text-[#3261ab]"
                                data-test="logout-button"
                            >
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:header>

            <div class="flex flex-1 flex-col">
                {{ $slot }}
            </div>

            @fluxScripts
        </div>
    </body>
</html>
