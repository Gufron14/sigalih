<?php

namespace App\Livewire\Admin\Berita;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('livewire.admin.layouts.app')]
#[Title('Edit Berita')]
class Update extends Component
{   
    use WithFileUploads;

    public $title, $content, $image, $slug;
    public $postId;
    public $posts;
    public $existingImage;

    public function mount($id)
    {
        $post = Post::findOrFail($id);
        
        if($post) {
            $this->postId   = $post->id;
            $this->title    = $post->title;
            $this->content  = $post->content;
            $this->existingImage  = $post->image;
            $this->slug  = $post->slug;
        }
    }

    public function updatingTitle($value)
    {
        // Update slug berdasarkan title baru
        $this->slug = Str::slug($value, '-');
    }

    public function update()
    {
        $this->validate([
            'title' => 'max:100',
            'content' => 'required',
            'slug' => 'unique:posts,slug,' . $this->postId,
        ]);

        $post = Post::findOrFail($this->postId);

        if ($this->image instanceof \Illuminate\Http\UploadedFile) {
            // Delete the old image if exists
            if($post->image) {
                Storage::delete($post->image);
            }

            // Store the new image
            $imagePath = $this->image->store('public/image');
            $post->image = $imagePath;
        } else {
            // Keep the existing image if no new image is uploaded
            $post->image = $this->existingImage;
        }

        $post->title = $this->title;
        $post->content = $this->content;
        $post->slug = $this->slug;
        $post->save();

        $this->reset();
        $this->posts = Post::all();

        session()->flash('success', 'Berhasil memperbarui Berita');

        return redirect()->to('admin/berita');
    }
    
    public function render()
    {
        return view('livewire.admin.berita.update', [
            'posts' => $this->posts,
        ]);
    }
}
