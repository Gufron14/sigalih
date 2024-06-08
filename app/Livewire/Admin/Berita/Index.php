<?php

namespace App\Livewire\Admin\Berita;

use App\Models\Post;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Masmerise\Toaster\Toastable;
use Svg\Tag\Path;

#[Layout('livewire.admin.layouts.app')]
#[Title('Daftar Berita')]
class Index extends Component
{   
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        
        Storage::delete($post->image);
        $post->delete();

        if($post) {
            $post->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return Redirect::back();

    }

    public function render()
    {   
        $posts = Post::all();
        return view('livewire.admin.berita.index', compact('posts'));
    }
}
