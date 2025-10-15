@props([
    'title',
    'description',
])

<div class="flex w-full flex-col gap-3 text-center">
    <span class="mx-auto inline-flex items-center gap-2 bg-[#3261ab]/10 px-3 py-1 text-xs font-semibold uppercase tracking-[0.32em] text-[#3261ab]">
        {{ __('Account portal') }}
    </span>
    <flux:heading size="xl" class="font-semibold text-2xl text-slate-800">{{ $title }}</flux:heading>
    <flux:subheading class="text-sm text-slate-500">{{ $description }}</flux:subheading>
</div>
