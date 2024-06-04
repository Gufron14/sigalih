<?php

namespace App\Livewire\Berita;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{   
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {   
        $posts = Post::latest()->take('7')->get();
        return view('livewire.berita.show', compact('posts'), ['post' => $this->post,]);
    }
}
