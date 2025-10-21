<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="app-body min-h-screen relative overflow-hidden">
        <div aria-hidden="true" class="pointer-events-none absolute -right-32 top-28 hidden h-80 w-80 border border-[#3261ab24] bg-[radial-gradient(circle_at_30%_30%,rgba(216,226,18,0.28),transparent_70%)] lg:block"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -left-24 bottom-12 hidden h-72 w-72 border border-[#3261ab1f] bg-[conic-gradient(from_140deg_at_50%_50%,rgba(50,97,171,0.18),transparent)] lg:block"></div>

        <flux:sidebar sticky stashable class="relative flex min-h-screen flex-col gap-10 border-r border-[#3261ab1a] bg-white/90 px-6 py-10 backdrop-blur-md">
            <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#3261ab10] to-transparent"></div>

            <flux:sidebar.toggle
                class="inline-flex items-center justify-center rounded-[5px] border border-[#3261ab33] bg-white px-3 py-2 text-sm font-medium text-[#3261AB] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white lg:hidden"
                icon="x-mark"
            />

            <a
                href="{{ route('dashboard') }}"
                class="relative z-[1] inline-flex items-center gap-3 rounded-[5px] border border-transparent bg-white/80 px-4 py-3 text-[#3261AB] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white"
                wire:navigate
            >
                <span class="flex h-12 w-12 items-center justify-center border border-[#3261ab33] bg-white text-[#3261AB]">
                    <x-app-logo-icon class="h-7 w-7 fill-current" />
                </span>
                <span class="dashboard-heading text-[20px] font-semibold">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <flux:navlist variant="outline" class="relative z-[1] flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <span class="text-sm uppercase tracking-[0.12em] text-[#4c5a78]">{{ __('Platform') }}</span>
                    <span class="h-[1px] w-12 bg-[#3261AB]"></span>
                </div>
                <flux:navlist.item
                    icon="home"
                    :href="route('dashboard')"
                    :current="request()->routeIs('dashboard')"
                    wire:navigate
                    class="rounded-[5px] border border-transparent bg-white/70 px-3 py-2 text-base font-medium text-[#1c2337] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
                >
                    {{ __('Dashboard') }}
                </flux:navlist.item>
            </flux:navlist>

            <flux:spacer />

            <flux:navlist variant="outline" class="relative z-[1] flex flex-col gap-3">
                <flux:navlist.item
                    icon="folder-git-2"
                    href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank"
                    class="rounded-[5px] border border-transparent px-3 py-2 text-base font-medium text-[#1c2337] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
                >
                    {{ __('Repository') }}
                </flux:navlist.item>

                <flux:navlist.item
                    icon="book-open-text"
                    href="https://laravel.com/docs/starter-kits#livewire"
                    target="_blank"
                    class="rounded-[5px] border border-transparent px-3 py-2 text-base font-medium text-[#1c2337] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
                >
                    {{ __('Documentation') }}
                </flux:navlist.item>
            </flux:navlist>

            <flux:dropdown class="relative z-[1] hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                    data-test="sidebar-menu-button"
                    class="rounded-[5px] border border-[#3261ab33] bg-white/90 px-4 py-2 text-base font-medium text-[#1c2337] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white"
                />

                <flux:menu class="w-[240px] border border-[#3261ab1a] bg-white/95 shadow-[0_18px_40px_rgba(33,57,116,0.14)]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-base font-normal">
                            <div class="flex items-center gap-3 px-2 py-2 text-start text-sm text-[#1c2337]">
                                <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-none border border-[#3261ab26] bg-[#3261AB] text-white">
                                    <span class="flex h-full w-full items-center justify-center text-base font-semibold">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold text-[#1c2337]">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-[#4c5a78]">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item
                            :href="route('profile.edit')"
                            icon="cog"
                            wire:navigate
                            class="rounded-[5px] px-3 py-2 text-[#1c2337] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
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
                            class="w-full rounded-[5px] px-3 py-2 text-left text-[#1c2337] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
                            data-test="logout-button"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:sidebar>

        <flux:header class="relative z-[1] flex items-center gap-4 border-b border-[#3261ab1a] bg-white/90 px-6 py-4 backdrop-blur-md lg:hidden">
            <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-12 bg-gradient-to-b from-[#3261ab10] to-transparent"></div>
            <flux:sidebar.toggle
                class="inline-flex items-center justify-center rounded-[5px] border border-[#3261ab33] bg-white px-3 py-2 text-sm font-medium text-[#3261AB] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white lg:hidden"
                icon="bars-2"
                inset="left"
            />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                    class="rounded-[5px] border border-[#3261ab33] bg-white/90 px-4 py-2 text-base font-medium text-[#1c2337] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white"
                />

                <flux:menu class="border border-[#3261ab1a] bg-white/95 shadow-[0_18px_40px_rgba(33,57,116,0.14)]">
                    <flux:menu.radio.group>
                        <div class="p-0 text-base font-normal">
                            <div class="flex items-center gap-3 px-2 py-2 text-start text-sm text-[#1c2337]">
                                <span class="relative flex h-10 w-10 shrink-0 overflow-hidden rounded-none border border-[#3261ab26] bg-[#3261AB] text-white">
                                    <span class="flex h-full w-full items-center justify-center text-base font-semibold">
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold text-[#1c2337]">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-[#4c5a78]">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item
                            :href="route('profile.edit')"
                            icon="cog"
                            wire:navigate
                            class="rounded-[5px] px-3 py-2 text-[#1c2337] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
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
                            class="w-full rounded-[5px] px-3 py-2 text-left text-[#1c2337] hover:bg-[#3261AB0f] hover:text-[#3261AB]"
                            data-test="logout-button"
                        >
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>
