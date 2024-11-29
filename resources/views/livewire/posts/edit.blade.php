<?php

use App\Models\Post;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    public Post $post;

    #[Validate('required|string|max:255')]
    public string $title = '';

    #[Validate('required|string')]
    public string $content = '';

    public function mount(Post $post): void
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update(): void
    {
        $this->authorize('update', $this->post);

        $validated = $this->validate();

        $this->post->update($validated);

        $this->dispatch('post-updated');
    }

    public function cancel(): void
    {
        $this->dispatch('post-edit-cancelled');
    }
}; ?>

<div class="w-full max-w-4xl space-y-8">
    <h1 class="font-serif font-bold text-center text-3xl">Edit Post</h1>
    <form wire:submit.prevent="update" class="flex flex-col gap-4">
        <div class="space-y-1">
            <x-input-label for="title" :value="__('Title')" />
            <input class="rounded w-full" type="text" wire:model="title" placeholder="Post Title">
            <x-input-error :messages="$errors->get('title')" />
        </div>
        <div class="space-y-1">
            <x-input-label for="content" :value="__('Content')" />
            <textarea class="min-h-[400px] rounded w-full" wire:model="content" placeholder="What's on your mind?"></textarea>
            <x-input-error :messages="$errors->get('content')" />
        </div>
        <div class="flex justify-end gap-4">
            <x-secondary-button wire:click="cancel">Cancel</x-secondary-button>
            <x-primary-button type="submit">Save</x-primary-button>
        </div>
    </form>
</div>
