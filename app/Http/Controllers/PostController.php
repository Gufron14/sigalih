<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('admin.resource.post.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.resources.post.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
            'slug' => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image_extension = $image->extension();
        $image_name = date('ymdhis') . '.' . $image_extension;
        $image->move(public_path('image'), $image_name);

        //create post
        Post::create([
            'image' => $image_name,
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
        ]);

        //redirect to index
        return redirect()
            ->back()
            ->with(['success' => 'Post Saved.']);
    }

    public function edit(Post $post)
    {
        $posts = Post::find($post->id);

        return view('admin.resources.post.edit', compact('posts'));
    }

    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'title' => 'required|min:5',
            'content' => 'required|min:10',
        ]);

        //check if image is uploaded
        if ($request->hasFile('thumbnail')) {
            //upload new image
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis') . '.' . $image_extension;
            $image->move(public_path('image'), $image_name);

            Storage::delete(public_path('image' . $post->id));

            //update post with new image
            $post->update([
                'image' => $image_name,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        } else {
            //update post without image
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }

        //redirect to index
        return redirect()
            ->route('posts')
            ->with(['success' => 'Post Updated.']);
    }

    public function destroy(Post $post)
    {
        Storage::delete('public/image' . $post->id);

        $post->delete();

        return redirect()->back()->with('success', 'Deleted Successfully.');
    }
}
