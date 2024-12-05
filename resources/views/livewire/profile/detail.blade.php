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

<div>
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->email }}</p>
    <p>{{ $user->created_at->format('j M Y') }}</p>
</div>
