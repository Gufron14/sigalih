<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <x-header/>
        <title>{{ $title ?? config('app.name') }}</title>
    </head>
    <body>
        @include('livewire.bank-sampah.components.navbar')

        <main class="container min-h-screen">
            <div class="container">
                {{ $slot }}
            </div>
        </main>

        <footer class="mt-5" style="background: rgb(240, 240, 240)">
            <div class="row mx-5 py-3 justify-content-between">
                <div class="col text-secondary">
                    &copy; <small>2024. Bank Sampah Sirnagalih.</small> 
                </div>
                <div class="col text-end">
                    <a href="">
                        <i class="fas fa-globe me-2"></i><small>sirnagalih.go.org</small>
                    </a>
                </div>
            </div>
        </footer>
        
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
