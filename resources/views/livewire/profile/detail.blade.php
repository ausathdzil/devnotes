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
        $this->user = User::find(request()->route('user'));
    }
}; ?>

<div>
    //
</div>
