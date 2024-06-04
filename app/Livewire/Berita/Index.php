<?php

namespace App\Livewire\Berita;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;


#[Title('Kabar Sirnagalih')]
class Index extends Component
{   

    public function render()
    {
        $post = Post::latest()->take('1')->get();
        $posts = Post::latest()->orderBy('created_at', 'asc')->take('4')->get();
        $lainnya = Post::all();
        return view('livewire.berita.index', compact('post', 'posts', 'lainnya'));
    }
}
