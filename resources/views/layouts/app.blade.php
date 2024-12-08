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
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&family=Merriweather:wght@400;700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-secondary tracking-tight">
    <div class="flex flex-col min-h-screen">
        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="grow flex flex-col items-center gap-8 px-16 py-8">
            {{ $slot }}
        </main>

        <footer class="border-t px-16 py-4 flex justify-between">
            <div class="text-center text-sm">
                &copy; {{ date('Y') }} DevNotes. All rights reserved.
            </div>
            <nav>
                <ul class="flex items-center gap-8">
                    <li>
                        <a href="{{ route('help') }}">Help</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                </ul>
            </nav>
        </footer>
    </div>
</body>

</html>
