<div>
    @if (Request::is('login'))
        @include('livewire.auth.login')
    @endif
    @if (Request::is('register'))
        @include('livewire.auth.register')
    @endif
    
</div>
