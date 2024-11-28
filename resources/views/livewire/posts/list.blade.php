<?php

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Collection $posts;

    public function mount(): void
    {
        $this->getPosts();
    }

    #[On('posts-created')]
    public function getPosts(): void
    {
        $this->posts = Post::with('user')->latest()->get();
    }
}; ?>

<ul class="flex flex-col items-center">
    @foreach ($posts as $post)
        <li class="space-y-2 border-b p-4 w-[50%]">
            <article class="space-y-2 text-muted">
                <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                    class="font-bold text-2xl text-black">{{ $post->title }}</a>
                {!! Str::markdown(
                    collect(explode("\n", $post->content))->filter(fn($line) => Str::startsWith($line, '#') === false)->first(fn($line) => trim($line) !== ''),
                ) !!}
                @if (str_word_count(strip_tags(Str::markdown($post->content))) > 25)
                    {{ __('...') }}
                    <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="font-bold text-accent">Read
                        more</a>
                @endif
                <p class="text-black">By {{ $post->user->name }}</p>
            </article>
            <div class="text-accent">
                <span>{{ $post->created_at->format('j M Y') }}</span>
                <span class="text-black">&bull;</span>
                <span>{{ $post->created_at->diffForHumans() }}</span>
            </div>
        </li>
    @endforeach
</ul>
