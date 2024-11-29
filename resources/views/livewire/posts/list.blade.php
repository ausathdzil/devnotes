<?php

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
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
        $this->posts = $query->latest()->get();
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
                    {!! Str::markdown(
                        collect(explode("\n", $post->content))->filter(fn($line) => Str::startsWith($line, '#') === false)->first(fn($line) => trim($line) !== ''),
                    ) !!}
                    @if (str_word_count(strip_tags(Str::markdown($post->content))) > 25)
                        {{ __('...') }}
                        <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                            class="font-bold text-accent">{{ __('Read more') }}</a>
                    @endif
                    <p class="text-black"> {{ __('By') }} {{ $post->user->name }}</p>
                </article>
                <div class="text-accent">
                    <span>{{ $post->created_at->format('j M Y') }}</span>
                </div>
            </li>
        @endforeach
    </ul>
</div>
