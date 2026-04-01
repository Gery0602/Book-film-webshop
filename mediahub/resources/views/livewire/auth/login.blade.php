<x-layouts.auth>
    <div class="flex flex-col gap-6">
        

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email cím')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Jelszó')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Jelszó')"
                    viewable
                />

            </div>

            <!-- Remember Me -->
            <flux:checkbox name="remember" :label="__('Emlékez rám')" :checked="old('emlékez')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Bejelentkezés') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Nincs fiókod?') }}</span>
                <flux:link :href="route('register')" wire:navigate>{{ __('Regisztrálj') }}</flux:link>
            </div>
        @endif

        
        <flux:link href="#" wire:navigate="false" @click="window.location.href='/password/no-email?'" class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
            {{ __('Elfelejtetted a jelszavad?') }}
        </flux:link>
    </div>
</x-layouts.auth>

