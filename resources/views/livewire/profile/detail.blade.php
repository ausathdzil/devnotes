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
    <div class="bg-tertiary text-black shadow rounded-lg p-6 flex items-center space-x-8">
        <img src="{{ 'https://ui-avatars.com/api/?background=172554&color=fafafa&name=' . urlencode($user->name) }}"
            alt="{{ $user->name }}" class="w-32 h-32 rounded-full object-cover">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p>{{ $user->email }}</p>
            <div class="mt-2 text-sm">
                <p>Posts: {{ $user->posts()->count() }}</p>
                <p>Joined: {{ $user->created_at->format('M d, Y') }}</p>
            </div>
            @if (auth()->id() === $user->id)
                <a href="{{ route('profile.settings') }}"
                    class="inline-block mt-4 bg-white text-secondary border border-secondary px-4 py-2 rounded-lg hover:bg-secondary hover:text-primary transition-colors">
                    Edit Profile
                </a>
            @endif
        </div>

    </div>

    <h1 class="font-bold text-2xl">
        @if (auth()->id() === $user->id)
            My Publications
        @else
            {{ $user->name }}'s Publications
        @endif
    </h1>
</div>
