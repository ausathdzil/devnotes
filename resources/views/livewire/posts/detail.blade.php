<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Illuminate\Support\Str;

new class extends Component {
    public Post $post;

    public int $readTime;

    public function mount(): void
    {
        $this->getPost();
        $this->calculateReadTime();
    }

    #[On('post-updated')]
    public function getPost(): void
    {
        $this->post = Post::with('user')->find(request()->route('post'));
    }

    public function calculateReadTime(): void
    {
        $wordCount = str_word_count(strip_tags($this->post->content));
        $this->readTime = max(1, ceil($wordCount / 225));
    }
}; ?>

<div class="space-y-8 p-4 w-[50%]">
    <article class="space-y-4 text-center">
        <h1 class="font-bold font-serif text-5xl">{{ $post->title }}</h1>
        <p>{{ $post->user->name }}</p>
        <div class="flex items-center justify-center gap-2">
            <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
            <span>&bull;</span>
            <p class="text-muted">{{ $readTime }} min read</p>
        </div>
    </article>
    <article class="prose">
        {!! Str::of($post->content)->markdown() !!}
    </article>
</div>
