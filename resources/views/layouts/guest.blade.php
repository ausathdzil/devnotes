<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevNotes') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Merriweather:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-secondary tracking-tight">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <article class="space-y-2 text-center">
            <a href={{ route('home') }}>
                <h1 class="font-serif font-bold text-4xl text-secondary">DevNotes</h1>
            </a>

            <p>{{ __('A place to share your notes and thoughts.') }}</p>
        </article>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

        @if (Route::currentRouteName() === 'login')
            <div class="mt-6 text-center text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}"
                    class="font-medium text-secondary hover:text-accent">Register</a>
            </div>
        @else
            <div class="mt-6 text-center text-sm text-gray-600">
                Already have an account? <a href="{{ route('login') }}"
                    class="font-medium text-secondary hover:text-accent">Login</a>
            </div>
        @endif
    </div>
</body>

</html>
