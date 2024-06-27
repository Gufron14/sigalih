<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('livewire.admin.components.header')
    <title>{{ $title ?? config('app.name') }}</title>
    @livewireStyles()
</head>

<body class="">
    <!-- Preloader -->

    <!-- Navbar -->
    @include('livewire.admin.components.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('livewire.admin.components.sidebar')
    

    <main id="main">

        <!-- Content-->
        <section class="container-fluid mt-3">   
            {{ $slot }}
        </section>
        <!-- / Content-->

    </main>

    @include('livewire.admin.components.script')
    <x-toaster-hub />
    @livewireScripts()
</body>

</html>
