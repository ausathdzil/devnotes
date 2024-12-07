<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
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
        if (request()->route('id')) {
            $id = request()->route('id');
        } else {
            $id = Auth::id();
        }

        $query = Post::with('user')
            ->where('user_id', $id)
            ->when($this->search, function ($query) {
                return $query->where(function ($q) {
                    $q->where('title', 'like', '%' . $this->search . '%')->orWhere('content', 'like', '%' . $this->search . '%');
                });
            });

        $this->posts = $query->latest()->get();
    }

    public function updatedSearch(): void
    {
        $this->getPosts();
    }

    public function calculateReadTime(Post $post): int
    {
        $wordCount = str_word_count(strip_tags(Str::markdown($post->content)));
        return max(1, ceil($wordCount / 225));
    }
}; ?>

<div class="space-y-4">
    <form wire:submit.prevent class="w-1/2">
        <input type="text" wire:model.live="search" placeholder="Search posts..."
            class="input input-bordered w-full rounded-lg">
    </form>

    <ul class="flex flex-col">
        @foreach ($posts as $post)
            <li class="space-y-4 border-b py-4 w-full">
                <article class="space-y-2 text-muted">
                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                        class="font-bold text-2xl text-black">{{ $post->title }}</a>

                    @php
                        $content = Str::markdown($post->content);
                        preg_match('/<p>(.*?)<\/p>/', $content, $matches);
                        $firstParagraphContent = $matches[1] ?? '';
                        $words = str_word_count(strip_tags($firstParagraphContent), 2);
                        $snippet = implode(' ', array_slice($words, 0, 25));
                    @endphp

                    <p>{!! $snippet !!}...<a href="{{ route('posts.show', ['id' => $post->id]) }}"
                            class="font-bold text-accent">{{ __('read more') }}</a></p>

                    <div class="flex items-center gap-2">
                        <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
                        <span>&bull;</span>
                        <p class="text-muted">{{ $this->calculateReadTime($post) }} min read</p>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p class="text-center text-gray-500 mt-4">{{ __('No posts found.') }}</p>
    @endif
</div>
