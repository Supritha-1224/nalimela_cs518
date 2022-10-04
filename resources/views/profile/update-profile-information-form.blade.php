<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('PROFILE INFORMATION') }}
    </x-slot>

    <x-slot name="description">
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-20 sm:col-span-15">
            <label for="name" value="{{ __('Name') }}">
            <input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" placeholder="Name">
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-20 sm:col-span-15">
            <label for="email" value="{{ __('Email') }}">
            <input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" placeholder="Email">
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
