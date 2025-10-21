<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body class="auth-body min-h-screen flex flex-col">
        <div class="flex-1 w-full">
            <div class="mx-auto flex min-h-screen max-w-6xl flex-col justify-center gap-12 px-6 py-12 lg:flex-row lg:items-stretch lg:gap-16 lg:px-12 lg:py-24">
                <div class="relative flex w-full max-w-xl flex-1 flex-col border border-[#3261ab21] bg-white px-8 py-12 shadow-[0_24px_56px_rgba(33,57,116,0.14)] sm:px-12 sm:py-14">
                    <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_-20%,rgba(216,226,18,0.28),transparent_65%)]"></div>
                    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#3261ab12] to-transparent"></div>
                    <div class="relative z-[1] mb-10 flex items-center gap-6">
                        <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-[5px] border border-[#3261ab33] bg-white/70 px-4 py-2 text-base font-medium text-[#3261AB] transition duration-200 ease-out hover:border-[#3261AB] hover:bg-[#3261AB] hover:text-white" wire:navigate>
                            <x-app-logo-icon class="h-6 w-6 text-current" />
                        </a>
                        <div aria-hidden="true" class="h-[2px] flex-1 bg-[#3261ab26]"></div>
                    </div>
                    <div class="relative z-[1] flex flex-col gap-10">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
