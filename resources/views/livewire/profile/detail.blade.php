<?php

use App\Models\User;
use Livewire\Volt\Component;

new class extends Component {
    public User $user;

    public function mount(): void
    {
        $this->getUser();
    }

    public function getUser(): void
    {
        $this->user = User::find(request()->route('id'));
    }
}; ?>

<div class="space-y-8">
    <div class="bg-tertiary text-black shadow rounded-lg p-6 flex items-start space-x-8">
        <img src="{{ 'https://ui-avatars.com/api/?background=172554&color=fafafa&name=' . urlencode($user->name) }}"
            alt="{{ $user->name }}" class="w-28 h-28 rounded-full object-cover">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
            <div class="mt-2 text-sm">
                <p>Posts: {{ $user->posts()->count() }}</p>
                <p>Joined: {{ $user->created_at->format('M d, Y') }}</p>
            </div>
        </div>
        @if (auth()->id() === $user->id)
            <div class="flex justify-end">
                <a href="{{ route('profile.settings') }}">
                    <x-secondary-button>
                        {{ __('Edit Profile') }}
                    </x-secondary-button>
                </a>
            </div>
        @endif
    </div>

    @if ($user->about)
        <article class="space-y-4">
            <h1 class="font-bold text-2xl">About</h1>
            <p>{{ $user->about }}</p>
        </article>
    @endif

    <h1 class="font-bold text-2xl">
        @if (auth()->id() === $user->id)
            My Publications
        @else
            {{ $user->name }}'s Publications
        @endif
    </h1>
</div>
