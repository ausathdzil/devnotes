<?php

use App\Models\Post;
use App\Models\Comment;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new class extends Component {
    public Post $post;

    #[Validate('required|string|max:255')]
    public string $comment = '';

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function store()
    {
        $validated = $this->validate();

        auth()->user()->comments()->create([
            'comment' => $validated['comment'],
            'post_id' => $this->post->id,
        ]);

        $this->comment = '';
        $this->dispatch('comment-created');
    }
}; ?>

<form class="flex flex-col gap-4 items-end" wire:submit="store">
    <textarea class="w-full rounded-lg min-h-[50px]" wire:model="comment" placeholder="Write a comment..."></textarea>
    <x-input-error :messages="$errors->get('comment')" />

    <x-primary-button class="w-fit">Add Comment</x-primary-button>
</form>
