<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-header/>
        <title>{{ $title ?? config('app.name') }}</title>
    </head>
    <body>
        @include('livewire.bank-sampah.components.navbar')

        <main class="min-h-screen">
            <div class="container">
                {{ $slot }}
            </div>
        </main>
        
        @include('livewire.bank-sampah.components.script')
    </body>
</html>
