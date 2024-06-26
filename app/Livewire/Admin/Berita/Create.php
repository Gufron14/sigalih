<?php

namespace App\Livewire\Admin\Berita;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Tambah Berita')]

class Create extends Component
{   
    use WithFileUploads;

    public $title, $content, $image, $slug;

    public function updatedTitle($value)
    {
        $this->slug = Str::slug($value);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|max:100',
            'content' => 'required',
            'image' => 'image|mimes:png,jpg|max:2048',
            'slug' => 'required|unique:posts,slug',
        ]);

        $imagePath = $this->image->store('public/image');

        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
            'slug' => $this->slug
        ]);

        session()->flash('success', 'Data Berhasil Ditambahkan.');
        $this->reset();
        return redirect()->back();
    }
    
    public function render()
    {
        return view('livewire.admin.berita.create');
    }
}
