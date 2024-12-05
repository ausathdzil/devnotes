<?php

use App\Models\Post;
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
        $query = Post::with('user')
            ->where('user_id', Auth::id())
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
}; ?>

<div class="flex flex-col gap-8 w-1/2">
    <div class="bg-tertiary text-black shadow rounded-lg p-6 flex items-center space-x-8">
        <img src="{{ 'https://ui-avatars.com/api/?background=172554&color=fafafa&name=' . urlencode(Auth::user()->name) }}"
            alt="{{ Auth::user()->name }}" class="w-32 h-32 rounded-full object-cover">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <div class="mt-2 text-sm">
                <p>Posts: {{ Auth::user()->posts()->count() }}</p>
                <p>Joined: {{ Auth::user()->created_at->format('M d, Y') }}</p>
                <a href="{{ route('profile.settings') }}"
                    class="inline-block mt-4 bg-white text-secondary border border-secondary px-4 py-2 rounded-lg hover:bg-secondary hover:text-primary transition-colors">
                    Edit Profile
                </a>
            </div>
        </div>
    </div>

    <h1 class="font-bold text-3xl">My Publication</h1>

    <form wire:submit.prevent class="w-1/2">
        <input type="text" wire:model.live="search" placeholder="Search your posts..."
            class="input input-bordered w-full rounded-lg">
    </form>

    <ul class="flex flex-col">
        @foreach ($posts as $post)
            <li class="space-y-4 border-b py-4 w-full">
                <article class="space-y-2 text-muted">
                    <a href="{{ route('posts.show', ['id' => $post->id]) }}"
                        class="font-bold text-2xl text-black">{{ $post->title }}</a>

                    @php
                        $content = strip_tags(Str::markdown($post->content));
                        $words = str_word_count($content, 2);
                        $snippet = implode(' ', array_slice($words, 0, 20));
                    @endphp

                    @if (count($words) > 20)
                        <p>{!! $snippet !!}...<a href="{{ route('posts.show', ['id' => $post->id]) }}"
                                class="font-bold text-accent">{{ __('read more') }}</a></p>
                    @else
                        <p>{!! $content !!}</p>
                    @endif

                    <p class="text-accent">{{ $post->created_at->format('j M Y') }}</p>
                </article>
            </li>
        @endforeach
    </ul>

    @if ($posts->isEmpty())
        <p class="text-center text-gray-500 mt-4">{{ __('No posts found.') }}</p>
    @endif
</div>
