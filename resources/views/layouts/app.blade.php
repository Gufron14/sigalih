<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-header />
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles
</head>

<body>
    @if (Request::is('login') || Request::is('register') || Request::is('logout'))
    @else
        <x-navbar />
    @endif

    <main class="min-h-screen">
        <div>
            {{ $slot }}
        </div>
    </main>

    @if (Request::is('login') || Request::is('register') || Request::is('logout'))
    @else
        <x-footer />
    @endif

    @livewireScripts
</body>

</html>
