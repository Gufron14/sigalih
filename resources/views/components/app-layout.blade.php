<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.header')
</head>

<body>
    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Content --}}
    <div class="min-h-screen">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Script --}}
    @include('components.script')
</body>

</html>
