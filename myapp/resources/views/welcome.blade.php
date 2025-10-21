<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Noto+Sans+JP:wght@400;500;600&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])
    </head>
    <body class="welcome-body antialiased min-h-screen bg-[#efefef] flex flex-col">
        <div class="flex-1 w-full">
            <div class="mx-auto flex max-w-6xl flex-col gap-12 px-6 py-12 lg:px-12 lg:py-20">
                @if (Route::has('login'))
                    <header class="relative overflow-hidden border border-[#3261ab26] bg-[#3261AB] text-white shadow-[0_22px_46px_rgba(33,57,116,0.22)]">
                        <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_15%_-40%,rgba(216,226,18,0.28),transparent_70%)]"></div>
                        <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 right-0 w-[140px] bg-[radial-gradient(circle_at_65%_35%,rgba(255,255,255,0.18),transparent_70%)]"></div>
                        <nav class="relative flex flex-wrap items-center justify-end gap-4 px-6 py-4 md:px-10">
                            @auth
                                <a
                                    href="{{ url('/dashboard') }}"
                                    class="inline-flex items-center justify-center rounded-[5px] border border-[#D8E212] bg-[#D8E212] px-5 py-2 text-base font-semibold text-[#1b1b18] transition duration-200 ease-out hover:border-[#e0ea1b] hover:bg-[#e0ea1b] hover:shadow-[0_12px_24px_rgba(33,57,116,0.22)] hover:-translate-y-1 transform"
                                >
                                    Dashboard
                                </a>
                            @else
                                <a
                                    href="{{ route('login') }}"
                                    class="inline-flex items-center justify-center rounded-[5px] border border-white/40 bg-white/10 px-5 py-2 text-base font-medium text-white transition duration-200 ease-out hover:border-white/60 hover:bg-white/20 hover:shadow-[0_12px_24px_rgba(18,32,70,0.25)] hover:-translate-y-1 transform"
                                >
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a
                                        href="{{ route('register') }}"
                                        class="inline-flex items-center justify-center rounded-[5px] border border-[#D8E212] bg-[#D8E212] px-5 py-2 text-base font-semibold text-[#1b1b18] transition duration-200 ease-out hover:border-[#e0ea1b] hover:bg-[#e0ea1b] hover:shadow-[0_12px_24px_rgba(33,57,116,0.22)] hover:-translate-y-1 transform"
                                    >
                                        Register
                                    </a>
                                @endif
                            @endauth
                        </nav>
                    </header>
                @endif

                <main class="relative grid gap-10 lg:grid-cols-[2fr_1.4fr]">
                    <section class="relative z-[1] overflow-hidden border border-[#3261ab1a] bg-white px-8 py-10 sm:px-12 sm:py-14 shadow-[0_24px_56px_rgba(33,57,116,0.14)]">
                        <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_20%_-20%,rgba(216,226,18,0.28),transparent_65%)]"></div>
                        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#3261ab10] to-transparent"></div>
                        <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 w-[6px] bg-[#3261AB]"></div>
                        <div class="relative z-[1] flex flex-col gap-10">
                            <div class="flex items-center gap-4">
                                <div class="flex h-12 w-12 items-center justify-center border border-[#D8E212] bg-[#D8E21233] shadow-[0_14px_28px_rgba(216,226,18,0.3)]">
                                    <span class="h-2 w-2 bg-[#3261AB]"></span>
                                </div>
                                <h1 class="welcome-heading text-[32px] font-semibold leading-tight text-[#3261AB]">Let's get started</h1>
                            </div>
                            <p class="text-base leading-7 text-[#4c5a78]">
                                Laravel has an incredibly rich ecosystem. <br>We suggest starting with the following.
                            </p>
                            <div>
                                <a
                                    href="https://cloud.laravel.com"
                                    target="_blank"
                                    class="inline-flex items-center justify-center rounded-[5px] border border-[#D8E212] bg-[#D8E212] px-6 py-4 text-base font-semibold text-[#1b1b18] shadow-[0_12px_28px_rgba(216,226,18,0.28)] transition duration-200 ease-out hover:border-[#e0ea1b] hover:bg-[#e0ea1b] hover:shadow-[0_16px_32px_rgba(216,226,18,0.3)] hover:-translate-y-1 transform"
                                >
                                    Deploy now
                                </a>
                            </div>
                        </div>
                    </section>

                    <aside class="relative z-[1] overflow-hidden border border-[#3261ab1a] bg-white px-8 py-10 sm:px-12 sm:py-14 shadow-[0_24px_48px_rgba(33,57,116,0.12)]">
                        <div aria-hidden="true" class="pointer-events-none absolute inset-y-0 left-0 w-[4px] bg-[#3261AB]"></div>
                        <div aria-hidden="true" class="pointer-events-none absolute -right-16 -top-12 h-40 w-40 bg-[radial-gradient(circle_at_35%_35%,rgba(216,226,18,0.45),transparent_70%)]"></div>
                        <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-[#3261ab12] to-transparent"></div>
                        <ul class="relative z-[1] space-y-8">
                            <li class="flex items-start gap-4">
                                <span class="mt-2 flex h-4 w-4 shrink-0 items-center justify-center border border-[#3261AB] bg-[#D8E212] shadow-[0_10px_20px_rgba(216,226,18,0.3)]">
                                    <span class="h-2 w-2 bg-[#3261AB]"></span>
                                </span>
                                <span class="text-base leading-7 text-[#1c2337]">
                                    Read the
                                    <a href="https://laravel.com/docs" target="_blank" class="inline-flex items-center gap-2 font-semibold text-[#3261AB] underline decoration-2 underline-offset-4 transition duration-200 ease-out hover:text-[#274d8d]">
                                        Documentation
                                        <svg
                                            class="h-3 w-3 shrink-0"
                                            width="10"
                                            height="11"
                                            viewBox="0 0 10 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                                stroke="currentColor"
                                                stroke-linecap="square"
                                            />
                                        </svg>
                                    </a>
                                </span>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="mt-2 flex h-4 w-4 shrink-0 items-center justify-center border border-[#3261AB] bg-[#D8E212] shadow-[0_10px_20px_rgba(216,226,18,0.3)]">
                                    <span class="h-2 w-2 bg-[#3261AB]"></span>
                                </span>
                                <span class="text-base leading-7 text-[#1c2337]">
                                    Watch video tutorials at
                                    <a href="https://laracasts.com" target="_blank" class="inline-flex items-center gap-2 font-semibold text-[#3261AB] underline decoration-2 underline-offset-4 transition duration-200 ease-out hover:text-[#274d8d]">
                                        Laracasts
                                        <svg
                                            class="h-3 w-3 shrink-0"
                                            width="10"
                                            height="11"
                                            viewBox="0 0 10 11"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                        >
                                            <path
                                                d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                                stroke="currentColor"
                                                stroke-linecap="square"
                                            />
                                        </svg>
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </aside>

                    <div aria-hidden="true" class="pointer-events-none absolute -right-24 -bottom-24 hidden h-72 w-72 border border-[#3261ab24] bg-[conic-gradient(from_120deg_at_50%_50%,rgba(50,97,171,0.2),transparent)] opacity-70 lg:block z-0"></div>
                </main>
            </div>
        </div>
    </body>
</html>
