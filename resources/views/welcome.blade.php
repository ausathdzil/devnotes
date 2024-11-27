<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DevNotes</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600|merriweather:400,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans bg-primary text-secondary">
    <div class="flex flex-col h-screen">
        <header class="flex items-center px-16 py-4 border-b">
            <a class="font-serif font-bold text-2xl" href="/">
                DevNotes
            </a>
            <nav class="grow text-right text-sm space-x-8">
                <a class="hover:underline underline-offset-2" href="{{ route('home') }}">Home</a>
                @auth
                    <a class="bg-secondary text-primary px-5 py-3 rounded-lg hover:bg-secondary/95 transition-colors"
                        href="{{ route('profile') }}">
                        Profile
                    </a>
                @else
                    <a class="bg-secondary text-primary px-5 py-3 rounded-lg hover:bg-secondary/95 transition-colors"
                        href="{{ route('login') }}">
                        Get Started
                    </a>
                @endauth
            </nav>
        </header>

        <main class="grow px-16 py-8 flex items-center justify-between gap-16">
            <div class="flex flex-col gap-4">
                <article class="space-y-4 text-xl">
                    <p class="font-bold">Welcome to DevNotes</p>
                    <h1 class="font-serif font-bold text-6xl text-accent">Empowering Creativity & Effortless Publishing
                    </h1>
                    <p>
                        We are here to provide space for every writer, creator, and creative thinker to express
                        themselves
                        and share inspiration with the world.
                    </p>
                </article>
                <a class="w-fit bg-secondary text-primary px-5 py-3 rounded-lg hover:bg-secondary/95 transition-colors"
                    href="{{ route('home') }}">
                    Start Reading
                </a>
            </div>
            <img class="rounded-lg" src="/hero.jpg" alt="hero image" width="650px" height="400px">
        </main>

        <footer class="border-t py-4">
            <div class="text-center text-sm">
                &copy; {{ date('Y') }} DevNotes.
            </div>
        </footer>
    </div>
</body>

</html>
