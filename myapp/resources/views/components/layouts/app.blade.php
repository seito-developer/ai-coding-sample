<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main class="relative flex flex-1 flex-col">
        {{ $slot }}
    </flux:main>
</x-layouts.app.sidebar>
