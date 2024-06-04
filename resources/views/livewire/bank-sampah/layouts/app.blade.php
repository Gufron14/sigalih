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
        <script>
            function showSweetAlert() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Anda telah mengajukan pengambilan sampah.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
        <script>
            function showTarikSaldo() {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Saldo berhasil ditarik.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            }
        </script>
    </body>
</html>
