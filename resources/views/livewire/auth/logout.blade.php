<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="card shadow w-50 p-5">
            <div class="card-body text-center">
                <h3>Apa kamu yakin akan Logout?</h3>
            </div>
            <div class="mx-auto">
                <button class="btn btn-primary" wire:click="logout">Ya</button>
                <a href="{{ route('home') }}" class="btn btn-danger">Batal</a>
            </div>
        </div>
    </div>
</div>
