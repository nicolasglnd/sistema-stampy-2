<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('titulo','Sistema Stampy')</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            {{-- Navbar --}}
            @include('layouts.header')
        </header>

        <main class="min-h-screen">
            @if (!Request::is('/'))
                <div class="my-4 text-center">
                    <h1 class="text-lg font-semibold m-4 uppercase">@yield('cabecera')</h1>
                </div>
            @endif
            @yield('contenido')
        </main>
        {{-- footer --}}
            @include('layouts.footer')
    </body>
</html>