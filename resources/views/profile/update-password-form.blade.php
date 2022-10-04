<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE PASSWORD</title>
  </head>
  <body style="background-color:#8FBC8F;">
  </body>
</html>
<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('UPDATE PASSWORD') }}
    </x-slot>

    <x-slot name="description">
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <label for="current_password" value="{{ __('Current Password') }}">
            <input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" placeholder="Current Password">
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>
        
        <div>
            {{ __('must contain 10-15 characters') }}
        </div>
        
        <div class="col-span-6 sm:col-span-4">
            <label for="password" value="{{ __('New Password') }}">
            <input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" placeholder="Password">
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <label for="password_confirmation" value="{{ __('Confirm Password') }}">
            <input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
