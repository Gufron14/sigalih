<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-header />
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles
</head>

<body>
    @if (
        // User
        Request::is('login') ||
        Request::is('register') ||
        Request::is('logout') || 
        Request::is('syaratKetentuan') ||
        
        // Admin
        Request::is('admin/auth/login') ||
        Request::is('bs-admin/auth/login')
        )
    @else
        <x-navbar />
    @endif

    <main class="min-h-screen">
        <div>
            {{ $slot }}
        </div>
    </main>

    @if (
        Request::is('login') || 
        Request::is('register') || 
        Request::is('logout') || 
        Request::is('syaratKetentuan') ||
        Request::is('admin/auth/login') ||
        Request::is('bs-admin/auth/login')
    )
    @else
        <x-footer />
    @endif

    @livewireScripts
</body>

</html>
