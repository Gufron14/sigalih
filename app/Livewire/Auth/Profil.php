<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Profil extends Component
{
    use WithFileUploads;
    public $email;
    public $phone;
    public $user;
    public $avatar;
    protected $rules = [
        'avatar' => 'nullable|image|max:2048',
        'email' => 'required|email',
        'phone' => 'required|numeric|min:11',
    ];

    public function mount()
    {
        $this->user = Auth::user();
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->avatar = $this->user->avatar;
    }

    public function editProfil()
    {
        $validatedData = $this->validate();

        if ($this->avatar) {
            if ($this->user->avatar) {
                Storage::disk('public')->delete($this->user->avatar);
            }
            $path = $this->avatar->store('avatars', 'public');
            $validatedData['avatar'] = $path;
        }

        $this->user->update($validatedData);

        session()->flash('success', 'Profil berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.auth.profil');
    }
}

