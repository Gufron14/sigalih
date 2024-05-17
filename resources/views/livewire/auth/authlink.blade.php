<div>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($isLoggedIn)
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('layanan') }}">Layanan</a>
        <button wire:click="logout">Logout</button>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
</div>

