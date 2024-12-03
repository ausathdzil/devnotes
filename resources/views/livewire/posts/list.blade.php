<?php

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;

new class extends Component {
    #[Url(history: true)]
    public string $search = '';

    public Collection $posts;

    public function mount(): void
    {
        $this->getPosts();
    }

    #[On('posts-created')]
    public function getPosts(): void
    {
        $query = Post::with('user')->when($this->search, function ($query) {
            return $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                    ->orWhere('content', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($userQuery) {
                        $userQuery->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        });
        $this->posts = $query->latest()->take(4)->get();
    }

    public function calculateReadTime(Post $post): int
    {
        $wordCount = str_word_count(strip_tags(Str::markdown($post->content)));
        return max(1, ceil($wordCount / 225)); // Minimum 1 minute
    }

    public function updatedSearch(): void
    {
        $this->getPosts();
    }
}; ?>

<div class="w-1/2 flex flex-col items-center gap-8">
    <form wire:submit.prevent class="w-3/4">
        <input type="text" wire:model.live="search" placeholder="Search posts..."
            class="input input-bordered w-full rounded-lg">
    </form>

    <ul class="flex flex-col items-center w-full">
        @foreach ($posts as $post)
            <li class="space-y-2 border-b p-4 w-full">
                <article class="space-y-2 text-muted">
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                        class="font-bold text-2xl text-black">{{ $post->title }}</a>

                    @php
                        $content = strip_tags(Str::markdown($post->content));
                        $words = str_word_count($content, 2);
                        $snippet = implode(' ', array_slice($words, 0, 25));
                    @endphp

                    @if (count($words) > 25)
                        <p>{!! $snippet !!}...<a href="{{ route('posts.show', ['post' => $post->id]) }}"
                                class="font-bold text-accent">{{ __('read more') }}</a></p>
                    @else
                        <p>{!! $content !!}</p>
                    @endif

                    <p class="text-black">{{ __('By') }} {{ $post->user->name }}</p>
                </article>
                <div class="flex items-center gap-2">
                    <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
                    <span>&bull;</span>
                    <p class="text-muted">{{ $this->calculateReadTime($post) }} min read</p>
                </div>
            </li>
        @endforeach
    </ul>
</div>
