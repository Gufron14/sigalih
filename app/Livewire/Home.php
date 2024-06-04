<?php

namespace App\Livewire;

use App\Models\JenisSurat;
use App\Models\Post;
use Livewire\Component;
use Livewire\Attributes\Title;


#[Title('Desa Sirnagalih Cisurupan')]
class Home extends Component
{
    public function render()
    {   
        $surats = JenisSurat::latest()->orderBy('nama_surat', 'asc')->take('3')->get();
        $post = Post::latest()->take('1')->get();
        $posts = Post::orderBy('created_at', 'asc')->latest()->take('4')->get();
        
        return view('livewire.home', compact('post', 'posts', 'surats'));
    }

}
