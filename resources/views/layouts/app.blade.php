<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-header/>
        <title>{{ $title ?? config('app.name') }}</title>
    </head>
    <body>
        @if (Request::is('login') || Request::is('register'))
            
        @else
            <x-navbar/>
        @endif

        <main class="min-h-screen">
            <div class="container">
                {{ $slot }}
            </div>
        </main>

        @if (Request::is('login') || Request::is('register'))
            
        @else
            <x-footer/>
        @endif
    </body>
</html>
