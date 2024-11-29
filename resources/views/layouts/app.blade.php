<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DevNotes') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=manrope:400,500,600|merriweather:400,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-secondary">
    <div class="flex flex-col min-h-screen">
        <livewire:layout.navigation />

        <!-- Page Content -->
        <main class="grow flex flex-col items-center gap-8 px-16 py-8">
            {{ $slot }}
        </main>

        <footer class="border-t py-4">
            <div class="text-center text-sm">
                &copy; {{ date('Y') }} DevNotes.
            </div>
        </footer>
    </div>
</body>

</html>
