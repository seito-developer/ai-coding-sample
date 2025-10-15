<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main class="min-h-svh bg-transparent">
        <div class="mx-auto flex w-full max-w-6xl flex-col gap-10 px-6 py-10 lg:px-12">
            {{ $slot }}
        </div>
    </flux:main>
</x-layouts.app.sidebar>
