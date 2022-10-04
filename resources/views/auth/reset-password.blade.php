<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <label for="email" value="{{ __('Email') }}">
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus placeholder="Email">
            </div>

            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}">
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password">
            </div>

            <div class="mt-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
