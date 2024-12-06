<x-app-layout>
    <div class="flex items-center gap-8">
        <div class="flex flex-col gap-4">
            <article class="space-y-4 text-xl">
                <p class="font-bold">{{ __('Welcome to DevNotes') }}</p>
                <h1 class="font-serif font-bold text-6xl text-accent">
                    {{ __('Empowering Creativity & Effortless Publishing') }}
                </h1>
                <p>
                    {{ __('We are here to provide space for every writer, creator, and creative thinker to express
                                                                                                                                                themselves
                                                                                                                                                and share inspiration with the world.') }}
                </p>
            </article>
            <a class="w-fit bg-secondary text-primary px-5 py-3 rounded-lg hover:bg-secondary/95 transition-colors"
                href="{{ route('home') }}">
                {{ __('Start Reading') }}
            </a>
        </div>
        <img class="rounded-lg" src="/hero.jpg" alt="hero image" width="650px" height="400px">
    </div>
</x-app-layout>
