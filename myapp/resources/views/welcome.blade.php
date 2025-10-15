<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Noto+Sans+JP:wght@400;500;700&display=swap"
            rel="stylesheet"
        />

        <style>
            :root {
                --baseColor: #3261ab;
                --subColor: #007fb1;
                --accentColor: #d8e212;
                --bgColor: #ffffff;
                font-size: 16px;
            }

            * {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                min-height: 100vh;
                font-family: 'Noto Sans JP', 'Noto Sans Japanese', 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                color: #1e293b;
                background:
                    radial-gradient(circle at 10% 20%, rgba(50, 97, 171, 0.18), transparent 55%),
                    radial-gradient(circle at 85% 10%, rgba(0, 127, 177, 0.15), transparent 60%),
                    linear-gradient(135deg, #f5f8ff 0%, #ffffff 35%, #f8fbff 100%);
            }

            h1,
            h2,
            h3 {
                font-family: 'Montserrat', 'Noto Sans JP', sans-serif;
                margin: 0;
                font-weight: 600;
                letter-spacing: -0.015em;
                color: #142440;
            }

            p {
                margin: 0;
                color: #475569;
            }

            a {
                color: var(--baseColor);
                text-decoration: none;
            }

            a:hover {
                color: var(--subColor);
            }

            .page {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            header {
                padding: 32px 24px 16px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 24px;
            }

            .brand {
                display: flex;
                align-items: center;
                gap: 12px;
                font-weight: 600;
                color: #142440;
            }

            nav {
                display: flex;
                gap: 16px;
            }

            .actions {
                display: flex;
                flex-wrap: wrap;
                gap: 16px;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
                padding: 12px 20px;
                font-size: 0.875rem;
                font-weight: 600;
                border: 1px solid transparent;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
                transition: all 0.2s ease-in-out;
            }

            .btn-primary {
                background-color: var(--baseColor);
                color: #ffffff;
                box-shadow: 0 20px 40px rgba(50, 97, 171, 0.25);
            }

            .btn-primary:hover {
                background-color: #274d8a;
            }

            .btn-secondary {
                border-color: var(--baseColor);
                color: var(--baseColor);
            }

            .btn-secondary:hover {
                background-color: rgba(50, 97, 171, 0.1);
            }

            .hero {
                padding: 56px 24px 40px;
                display: grid;
                gap: 48px;
                max-width: 1080px;
                width: 100%;
                margin: 0 auto;
            }

            .tag {
                display: inline-flex;
                align-items: center;
                gap: 12px;
                padding: 8px 16px;
                background: rgba(50, 97, 171, 0.15);
                color: var(--baseColor);
                font-size: 0.75rem;
                font-weight: 600;
                letter-spacing: 0.28em;
                text-transform: uppercase;
            }

            .hero-grid {
                display: grid;
                gap: 48px;
                align-items: center;
            }

            .hero-copy {
                display: flex;
                flex-direction: column;
                gap: 24px;
            }

            .hero-copy h1 {
                font-size: clamp(2.25rem, 5vw, 3.25rem);
            }

            .hero-copy p {
                font-size: 1rem;
                line-height: 1.6;
                max-width: 520px;
            }

            .hero-visual {
                display: grid;
                gap: 16px;
                grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            }

            .visual-card {
                padding: 24px;
                border: 1px solid rgba(50, 97, 171, 0.18);
                background: rgba(255, 255, 255, 0.85);
                box-shadow: 0 16px 40px rgba(50, 97, 171, 0.12);
            }

            .visual-card h3 {
                font-size: 1.5rem;
            }

            .visual-card p {
                font-size: 0.875rem;
            }

            .visual-card strong {
                display: block;
                margin-top: 16px;
                font-size: 2.25rem;
                color: var(--baseColor);
            }

            .section-title {
                max-width: 1080px;
                margin: 0 auto 24px;
                padding: 0 24px;
                display: flex;
                flex-direction: column;
                gap: 12px;
            }

            .section-title p {
                max-width: 560px;
                font-size: 1rem;
            }

            .features {
                max-width: 1080px;
                margin: 0 auto 80px;
                padding: 0 24px;
                display: grid;
                gap: 24px;
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }

            .feature-card {
                padding: 32px 24px;
                border: 1px solid rgba(50, 97, 171, 0.18);
                background: rgba(255, 255, 255, 0.9);
                box-shadow: 0 16px 40px rgba(50, 97, 171, 0.08);
            }

            .feature-card h3 {
                font-size: 1.25rem;
                margin-bottom: 12px;
            }

            .feature-card p {
                font-size: 0.95rem;
                line-height: 1.6;
            }

            .cta {
                background: linear-gradient(135deg, rgba(50, 97, 171, 0.12) 0%, rgba(216, 226, 18, 0.18) 100%);
                border-top: 1px solid rgba(50, 97, 171, 0.18);
            }

            .cta-inner {
                max-width: 1080px;
                margin: 0 auto;
                padding: 48px 24px 64px;
                display: grid;
                gap: 24px;
            }

            footer {
                margin-top: auto;
                padding: 32px 24px;
                font-size: 0.8rem;
                color: #64748b;
                text-align: center;
            }

            @media (min-width: 960px) {
                .hero-grid {
                    grid-template-columns: 1.15fr 0.85fr;
                }
            }
        </style>
    </head>
    <body>
        <div class="page">
            <header>
                <div class="brand">
                    <x-app-logo-icon style="width: 32px; height: 32px; color: var(--baseColor);" />
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </div>
                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary">{{ __('Dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary">{{ __('Log in') }}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-primary">{{ __('Register') }}</a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <section class="hero">
                <div class="hero-grid">
                    <div class="hero-copy">
                        <span class="tag">{{ __('Modern Dashboard') }}</span>
                        <h1>{{ __('Fresh visuals for your Laravel workspace') }}</h1>
                        <p>
                            {{ __('Experience a refined interface designed around the official style guide. Consistent typography, structured spacing, and the base/sub colors bring every screen together for teams that demand clarity.') }}
                        </p>
                        <div class="actions">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary">{{ __('Explore the app') }}</a>
                            <a href="https://laravel.com/docs" class="btn btn-secondary" target="_blank">{{ __('Read the docs') }}</a>
                        </div>
                    </div>
                    <div class="hero-visual">
                        <div class="visual-card">
                            <p>{{ __('Active members') }}</p>
                            <strong>58</strong>
                            <p>{{ __('Onboard teammates with a cohesive, trusted experience.') }}</p>
                        </div>
                        <div class="visual-card">
                            <p>{{ __('Success rate') }}</p>
                            <strong>94%</strong>
                            <p>{{ __('Color-coded highlights help teams react faster to change.') }}</p>
                        </div>
                        <div class="visual-card">
                            <p>{{ __('Avg. resolution time') }}</p>
                            <strong>1.8h</strong>
                            <p>{{ __('Clear cards and typography keep focus on what matters most.') }}</p>
                        </div>
                    </div>
                </div>
            </section>

            <div class="section-title">
                <span class="tag" style="background: rgba(216, 226, 18, 0.28); color: #142440;">{{ __('Why teams love it') }}</span>
                <h2>{{ __('Designed for clarity and speed') }}</h2>
                <p>{{ __('Every screen is tuned around the 8px grid. Buttons are crisp with 5px radius while structural panels stay sharp, giving you a confident, modern workspace.') }}</p>
            </div>

            <section class="features">
                <div class="feature-card">
                    <h3>{{ __('Consistent typography') }}</h3>
                    <p>{{ __('Noto Sans Japanese keeps reading effortless across languages while Montserrat anchors key headlines for impact.') }}</p>
                </div>
                <div class="feature-card">
                    <h3>{{ __('Palette in harmony') }}</h3>
                    <p>{{ __('Base #3261AB and sub #007FB1 guide attention, with accent #D8E212 offering energetic highlights where they matter.') }}</p>
                </div>
                <div class="feature-card">
                    <h3>{{ __('Thoughtful spacing') }}</h3>
                    <p>{{ __('8px rhythm governs padding, cards, and components so layouts stay aligned whether you build dashboards or onboarding flows.') }}</p>
                </div>
                <div class="feature-card">
                    <h3>{{ __('Ready for launch') }}</h3>
                    <p>{{ __('Sign in, manage profiles, and review insights with visuals that feel polished from day one.') }}</p>
                </div>
            </section>

            <section class="cta">
                <div class="cta-inner">
                    <h2>{{ __('Bring the refreshed look to your project today') }}</h2>
                    <p>{{ __('Clone the repository, install dependencies, and enjoy a Laravel experience that already feels crafted for modern teams.') }}</p>
                    <div class="actions">
                        <a href="https://github.com/laravel/livewire-starter-kit" class="btn btn-primary" target="_blank">{{ __('View repository') }}</a>
                        <a href="{{ route('register') }}" class="btn btn-secondary">{{ __('Create your account') }}</a>
                    </div>
                </div>
            </section>

            <footer>
                &copy; {{ now()->year }} {{ config('app.name', 'Laravel') }}. {{ __('Crafted with Laravel, Livewire, and the official design guide.') }}
            </footer>
        </div>
    </body>
</html>
