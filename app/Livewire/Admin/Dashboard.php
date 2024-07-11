<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\JenisSurat;
use App\Models\RequestSurat;
use App\Models\Warga;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;


#[Layout('livewire.admin.layouts.app')]
#[Title('Dashboard')]
class Dashboard extends Component
{   
    public $jenisSurat;
    public $requestSurat;
    public $warga;
    public $user;
    
    public function mount()
    {
        $this->jenisSurat = JenisSurat::count();
        $this->requestSurat = RequestSurat::count();
        $this->warga = Warga::count();
        $this->user = User::count();
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
}
