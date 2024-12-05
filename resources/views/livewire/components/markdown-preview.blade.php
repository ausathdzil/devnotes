<?php

use Livewire\Volt\Component;
use Illuminate\Support\Str;

new class extends Component {
    public string $markdown = '';

    public string $renderedHtml = '';

    public function updatedMarkdown()
    {
        $this->renderedHtml = Str::markdown($this->markdown);
    }
}; ?>

<div class="grid grid-cols-2 gap-8">
    <div class="space-y-1">
        <x-input-label for="markdown-input" :value="__('Markdown Input')" />
        <textarea class="rounded-lg w-full h-[250px]" wire:model.live.debounce-300ms="markdown" id="markdown-input"></textarea>
    </div>

    <div class="space-y-1">
        <x-input-label for="markdown-preview" :value="__('Preview')" />
        <div class="border rounded-lg w-full h-[250px] p-4">
            {!! $renderedHtml !!}
        </div>
    </div>
</div>
