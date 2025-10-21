<x-layouts.app :title="__('Dashboard')">
    <div class="relative mx-auto flex w-full max-w-6xl flex-col gap-10 px-6 py-12 lg:px-12 lg:py-16">
        <div aria-hidden="true" class="pointer-events-none absolute -top-20 right-0 hidden h-64 w-64 border border-[#3261ab24] bg-[radial-gradient(circle_at_35%_35%,rgba(216,226,18,0.28),transparent_70%)] lg:block"></div>
        <div aria-hidden="true" class="pointer-events-none absolute -bottom-24 left-8 hidden h-72 w-72 border border-[#3261ab1f] bg-[conic-gradient(from_120deg_at_50%_50%,rgba(50,97,171,0.18),transparent)] lg:block"></div>

        <div class="relative z-[1] flex flex-col gap-4">
            <span class="h-[2px] w-16 bg-[#3261AB]"></span>
            <h1 class="dashboard-heading text-[32px] font-semibold leading-tight text-[#3261AB]">
                {{ __('Dashboard') }}
            </h1>
        </div>

        <div class="relative z-[1] grid gap-8 lg:grid-cols-3">
            @foreach (range(1, 3) as $index)
                <div class="relative border border-[#3261ab1a] bg-white px-8 py-10 shadow-[0_24px_56px_rgba(33,57,116,0.14)]">
                    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-[#3261ab10] to-transparent"></div>
                    <div class="relative z-[1] flex flex-col gap-6">
                        <span class="h-[2px] w-12 bg-[#D8E212]"></span>
                        <div class="relative h-40 w-full border border-dashed border-[#3261ab33] bg-[#f5f7fb]">
                            <x-placeholder-pattern class="absolute inset-0 stroke-[#3261ab1f]" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="relative z-[1] border border-[#3261ab1a] bg-white px-8 py-12 shadow-[0_28px_60px_rgba(33,57,116,0.16)]">
            <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-24 bg-gradient-to-b from-[#3261ab10] to-transparent"></div>
            <div class="relative z-[1] flex flex-col gap-6">
                <span class="h-[2px] w-16 bg-[#3261AB]"></span>
                <div class="relative h-80 w-full border border-dashed border-[#3261ab33] bg-[#f5f7fb]">
                    <x-placeholder-pattern class="absolute inset-0 stroke-[#3261ab1f]" />
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
