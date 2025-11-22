<x-layouts.auth>
    <div class="flex flex-col gap-6">
        <x-auth-header :title="__('Készícs felhasználói fiókot')" :description="__('Add meg az adataidat a fiók létrehozásáshoz')" />

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register.store') }}" class="flex flex-col gap-6">
            @csrf
            <!-- Name -->
            <flux:input
                name="name"
                :label="__('Név')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Teljes név')"
            />

            <!-- Email Address -->
            <flux:input
                name="email"
                :label="__('Email cím')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Phone -->
            <flux:input
                name="phone"
                :label="__('Telefon szám')"
                type="number"
                required
                autocomplete="phone"
                placeholder="06205566560"
            />

            <!-- post-code -->
            <flux:input
                name="post_code"
                :label="__('Irányító szám')"
                type="text"
                required
                autocomplete="post-code"
                placeholder="3300"
            />

            <!-- city -->
            <flux:input
                name="city"
                :label="__('Város')"
                type="text"
                required
                autocomplete="city"
                placeholder="Eger"
            />

            <!-- address -->
            <flux:input
                name="address"
                :label="__('Cím')"
                type="text"
                required
                autocomplete="address"
                placeholder="Jókai utca 1."
            />

            <!-- country -->
            <flux:input
                name="country"
                :label="__('Ország')"
                type="text"
                required
                autocomplete="country"
                placeholder="Magyarország"
            />

            <!-- Password -->
            <flux:input
                name="password"
                :label="__('Jelszó')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Jelszó')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                name="password_confirmation"
                :label="__('Jelszó ismét')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Jelszó ismét')"
                viewable
            />

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="w-full" data-test="register-user-button" style=".w-full:hover{cursor:pointer;};">
                    {{ __('Regisztráció') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Van már fiókod?') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('Bejelentkezés') }}</flux:link>
        </div>
    </div>
</x-layouts.auth>
