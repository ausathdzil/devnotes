<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $content = '';
}; ?>

<form class="flex flex-col gap-4" wire:submit="store">
    <label for="title" class="sr-only">{{ __('Title') }}</label>
    <input class="border-none rounded-lg focus:ring-0" wire:model="title" placeholder="{{ __('Title') }}" />
    <x-input-error :messages="$errors->get('title')" />

    <label for="content" class="sr-only">{{ __('Content') }}</label>
    <textarea class="border-none rounded-lg focus:ring-0 min-h-[350px]" wire:model="message"
        placeholder="{{ __('What\'s on your mind?') }}"></textarea>
    <x-input-error :messages="$errors->get('content')" />

    <div class="flex justify-end">
        <x-primary-button class="w-fit">{{ __('Publish') }}</x-primary-button>
    </div>
</form>
