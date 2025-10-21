<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        Session::regenerate();

        $this->redirectIntended(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="flex flex-col gap-10">
    <x-auth-header :title="__('Create an account')" :description="__('Enter your details below to create your account')" />

    <x-auth-session-status class="text-center text-base font-medium text-[#3261AB]" :status="session('status')" />

    <form method="POST" wire:submit="register" class="flex flex-col gap-8">
        @csrf

        <div class="flex flex-col gap-2">
            <label for="name" class="text-base font-medium text-[#1c2337]">
                {{ __('Name') }}
            </label>
            <input
                id="name"
                type="text"
                wire:model="name"
                required
                autofocus
                autocomplete="name"
                placeholder="{{ __('Full name') }}"
                class="rounded-[5px] border border-[#3261ab33] bg-white px-4 py-3 text-base text-[#1c2337] placeholder:text-[#7a859f] outline-none transition duration-200 ease-out focus:border-[#3261AB] focus:ring-2 focus:ring-[#3261AB] focus:ring-offset-2 focus:ring-offset-white"
            />
            @error('name')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="email" class="text-base font-medium text-[#1c2337]">
                {{ __('Email address') }}
            </label>
            <input
                id="email"
                type="email"
                wire:model="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
                class="rounded-[5px] border border-[#3261ab33] bg-white px-4 py-3 text-base text-[#1c2337] placeholder:text-[#7a859f] outline-none transition duration-200 ease-out focus:border-[#3261AB] focus:ring-2 focus:ring-[#3261AB] focus:ring-offset-2 focus:ring-offset-white"
            />
            @error('email')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="password" class="text-base font-medium text-[#1c2337]">
                {{ __('Password') }}
            </label>
            <input
                id="password"
                type="password"
                wire:model="password"
                required
                autocomplete="new-password"
                placeholder="{{ __('Password') }}"
                class="rounded-[5px] border border-[#3261ab33] bg-white px-4 py-3 text-base text-[#1c2337] placeholder:text-[#7a859f] outline-none transition duration-200 ease-out focus:border-[#3261AB] focus:ring-2 focus:ring-[#3261AB] focus:ring-offset-2 focus:ring-offset-white"
            />
            @error('password')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label for="password_confirmation" class="text-base font-medium text-[#1c2337]">
                {{ __('Confirm password') }}
            </label>
            <input
                id="password_confirmation"
                type="password"
                wire:model="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="{{ __('Confirm password') }}"
                class="rounded-[5px] border border-[#3261ab33] bg-white px-4 py-3 text-base text-[#1c2337] placeholder:text-[#7a859f] outline-none transition duration-200 ease-out focus:border-[#3261AB] focus:ring-2 focus:ring-[#3261AB] focus:ring-offset-2 focus:ring-offset-white"
            />
            @error('password_confirmation')
                <p class="text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end">
            <button
                type="submit"
                data-test="register-user-button"
                class="inline-flex w-full items-center justify-center rounded-[5px] border border-[#D8E212] bg-[#D8E212] px-6 py-4 text-base font-semibold text-[#1b1b18] shadow-[0_12px_28px_rgba(216,226,18,0.28)] transition duration-200 ease-out hover:border-[#e0ea1b] hover:bg-[#e0ea1b] hover:shadow-[0_16px_32px_rgba(216,226,18,0.3)] hover:-translate-y-1 disabled:cursor-not-allowed disabled:opacity-70"
                wire:loading.attr="disabled"
            >
                {{ __('Create account') }}
            </button>
        </div>
    </form>

    <div class="flex flex-wrap items-center justify-center gap-2 text-base text-[#4c5a78]">
        <span>{{ __('Already have an account?') }}</span>
        <a href="{{ route('login') }}" class="font-semibold text-[#3261AB] underline decoration-2 underline-offset-4 transition duration-200 ease-out hover:text-[#274d8d]" wire:navigate>
            {{ __('Log in') }}
        </a>
    </div>
</div>
