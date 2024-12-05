<?php

use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string')]
    public string $content = '';

    public function store(): void
    {
        $validated = $this->validate();

        auth()->user()->posts()->create($validated);

        $this->title = '';
        $this->content = '';

        $this->dispatch('post-created');
    }
}; ?>

<form class="flex flex-col gap-4" wire:submit="store">
    <label for="title" class="sr-only">{{ __('Title') }}</label>
    <input class="rounded-lg" wire:model="title" placeholder="{{ __('Title') }}" id="title" />
    <x-input-error :messages="$errors->get('title')" />

    <label for="content" class="sr-only">{{ __('Content') }}</label>
    <textarea class="rounded-lg min-h-[350px]" wire:model="content" placeholder="{{ __('What\'s on your mind?') }}"
        id="content"></textarea>
    <x-input-error :messages="$errors->get('content')" />

    <div class="flex justify-end">
        <x-primary-button class="w-fit">{{ __('Publish') }}</x-primary-button>
    </div>
</form>
