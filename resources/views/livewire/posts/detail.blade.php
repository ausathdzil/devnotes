<?php

use App\Models\Post;
use Livewire\Volt\Component;
use Illuminate\Support\Str;

new class extends Component {
    public Post $post;

    public function mount(): void
    {
        $this->getPost();
    }

    #[On('post-updated')]
    public function getPost(): void
    {
        $this->post = Post::with('user')->find(request()->route('post'));
    }
}; ?>

<div class="space-y-8 p-4 w-[50%]">
    <article class="space-y-4 text-center">
        <h1 class="font-bold font-serif text-5xl">{{ $post->title }}</h1>
        <p>By {{ $post->user->name }}</p>
        <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
    </article>
    <article class="prose">
        {!! Str::of($post->content)->markdown() !!}
    </article>
</div>
