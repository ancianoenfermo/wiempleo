<!DOCTYPE html>
<html lang= "{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!-- Styles -->

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        {{--<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" /> --}}
        <style>
            li {
                font-size: 14px;
                margin-left: 10px;
                list-style-type: circle;
            }
        </style>

        @livewireStyles
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-50 z-50">
            @livewire('navigation-menu')
            <!-- Page Heading -->
            @if (isset($header))
                {{--<header class="bg-white shadow"> --}}
                    {{--<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
                        {{ $header }}
                    {{--</div>--}}
                {{-- </header>--}}
            @endif
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

</body>

</html>