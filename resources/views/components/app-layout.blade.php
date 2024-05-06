<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
</head>

<body>
    {{-- Navbar --}}
    @if (Request::is('login') || Request::is('register'))
        
    @else
        @include('components.navbar')
    @endif

    {{-- Content --}}
    <div class="min-h-screen">
        @yield('content')
    </div>

    @if (Request::is('login') || Request::is('register'))
        
    @else
        @include('components.footer')
    @endif

    {{-- Footer --}}

    {{-- Script --}}
    @include('components.script')
</body>

</html>
