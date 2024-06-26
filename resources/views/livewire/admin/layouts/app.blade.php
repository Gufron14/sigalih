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

        @if (!Request::is('livewire/admin/dashboard'))            
        <div class="bg-white border-bottom py-3 mb-3">
            <div
                class="container-fluid d-flex justify-content-between align-items-start align-items-md-center flex-column flex-md-row">
                <nav class="mb-0" aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 fs-6">
                        @yield('breadcrumbs')
                    </ol>
                </nav>
                <div class="d-flex justify-content-end align-items-center mt-3 mt-md-0">
                    @yield('button')
                </div>
            </div>
        </div> <!-- / Breadcrumbs-->
        @endif
        <!-- Breadcrumbs-->

        <!-- Content-->
        <section class="container-fluid">
            
            {{ $slot }}

            <!-- Sidebar Menu Overlay-->
            <div class="menu-overlay-bg"></div>
            <!-- / Sidebar Menu Overlay-->



        </section>
        <!-- / Content-->

    </main>

    @include('livewire.admin.components.script')
    <x-toaster-hub />
    @livewireScripts()
</body>

</html>
