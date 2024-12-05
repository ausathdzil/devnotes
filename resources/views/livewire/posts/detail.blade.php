<?php

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Post $post;

    public int $readTime;

    public function mount(): void
    {
        $this->getPost();
        $this->calculateReadTime();
    }

    #[On('post-updated')]
    #[On('post-created')]
    public function getPost(): void
    {
        $this->post = Post::with('user')->find(request()->route('post'));
    }

    public function calculateReadTime(): void
    {
        $wordCount = str_word_count(strip_tags($this->post->content));
        $this->readTime = max(1, ceil($wordCount / 225));
    }

    public function delete(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('home');
    }
}; ?>

<div class="space-y-8 p-4 md:w-1/2">
    <article class="space-y-4 text-center">
        <h1 class="font-bold font-serif text-5xl">{{ $post->title }}</h1>
        <p>{{ $post->user->name }}</p>
        <div class="flex items-center justify-center gap-2">
            <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
            <span>&bull;</span>
            <p class="text-muted">{{ $readTime }} min read</p>
        </div>
        @unless ($post->created_at->eq($post->updated_at))
            <p class="text-muted">Last updated {{ $post->updated_at->format('j M Y') }}.</p>
        @endunless
        @if ($post->user->is(auth()->user()))
            <a href="{{ route('posts.edit', $post) }}"
                class="w-fit flex items-center gap-2 px-3 py-2 hover:bg-tertiary rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    width="16" height="16" stroke="currentColor" class="text-secondary">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                </svg>
                <span>Edit</span>
            </a>
        @endif
    </article>
    <article class="prose font-serif">
        {!! Str::of($post->content)->markdown() !!}
    </article>

    @if ($post->user->is(auth()->user()))
        <x-danger-button wire:click="delete({{ $post->id }})">Delete Post</x-danger-button>
    @endif

    <div class="space-y-4">
        <h1 class="pt-4 border-t text-xl font-bold">Comments</h1>
        <livewire:comments.create :post="$post" :key="$post->id" />
        <livewire:comments.list :post="$post" :key="$post->id" />
    </div>
</div>
