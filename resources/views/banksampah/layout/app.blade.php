<!DOCTYPE html>
<html lang="en">

<head>
    @include('banksampah.layout.header')
</head>

<body>
    {{-- Navbar --}}
    @include('banksampah.layout.navbar')

    {{-- Content --}}
    <div class="min-h-screen">
        @yield('content')
    </div>

    {{-- Footer --}}
    {{-- @include('layout.footer') --}}

    {{-- Script --}}
    @include('banksampah.layout.script')
</body>

</html>