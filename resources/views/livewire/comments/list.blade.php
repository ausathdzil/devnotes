<?php

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Volt\Component;

new class extends Component {
    public Post $post;

    public Collection $comments;

    public function mount(): void
    {
        $this->getComments();
    }

    #[On('comment-created')]
    public function getComments(): void
    {
        $this->comments = Comment::with('user')
            ->where('post_id', $this->post->id)
            ->latest()
            ->take(4)
            ->get();
    }

    public function delete(Comment $comment): void
    {
        $this->authorize('delete', $comment);

        $comment->delete();

        $this->getComments();
    }
}; ?>

<ul>
    @foreach ($comments as $comment)
        <li class="flex gap-4 items-center w-full">
            <img src="{{ 'https://ui-avatars.com/api/?background=172554&color=fafafa&name=' . urlencode($comment->user->name) }}"
                alt="{{ $comment->user->name }}" class="w-14 h-14 rounded-full object-cover">
            <div class="space-y-1">
                <div class="text-black flex items-center gap-1">
                    <span class="font-bold">{{ $comment->user->name }}</span>
                    <span class="text-accent">&bull;</span>
                    <span class="text-muted">{{ $comment->created_at->diffForHumans() }}</span>
                    @if ($comment->user->is(auth()->user()))
                        <button aria-label="delete comment" class="ml-6 text-red-500"
                            wire:click="delete({{ $comment->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    @endif
                </div>
                <p>{{ $comment->comment }}</p>
            </div>
        </li>
    @endforeach
</ul>
