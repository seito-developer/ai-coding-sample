<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-[radial-gradient(circle_at_0%_0%,rgba(50,97,171,0.18),transparent_60%),radial-gradient(circle_at_100%_0%,rgba(216,226,18,0.25),transparent_55%),linear-gradient(180deg,#f7faff_0%,#ffffff_70%)] text-slate-800">
        <div class="flex min-h-svh flex-col items-center justify-center px-6 py-16">
            <div class="w-full max-w-md space-y-8">
                <div class="flex flex-col items-center gap-3 text-center">
                    <a href="{{ route('home') }}" class="flex flex-col items-center gap-3 font-medium" wire:navigate>
                        <span class="flex h-12 w-12 items-center justify-center rounded-[5px] bg-[#3261ab] text-white shadow-elevated">
                            <x-app-logo-icon class="size-8 fill-current" />
                        </span>
                        <span class="text-sm font-semibold uppercase tracking-[0.28em] text-slate-500">{{ config('app.name', 'Laravel') }}</span>
                    </a>
                    <p class="max-w-sm text-sm text-slate-500">{{ __('Secure access to your workspace dashboard, crafted with our refreshed interface guidelines.') }}</p>
                </div>

                <div class="glass-card">
                    <div class="flex flex-col gap-6">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
