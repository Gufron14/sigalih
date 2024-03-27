<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('components.header')
</head>
<body>
    @include('components.navbar')
    <div class="min-h-screen">
        @yield('content')
    </div>
    @include('components.footer')
    @include('components.script')
</body>
</html>