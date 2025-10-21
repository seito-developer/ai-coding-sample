@props([
    'title',
    'description',
])

<div class="flex w-full flex-col gap-4 text-left">
    <h1 class="auth-heading text-[28px] font-semibold leading-tight text-[#3261AB]">{{ $title }}</h1>
    <p class="text-base leading-7 text-[#4c5a78]">
        {{ $description }}
    </p>
</div>
