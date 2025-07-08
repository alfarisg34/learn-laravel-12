<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); // Atau gunakan pagination jika perlu
        return view('post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'picture' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'desc' => 'required|string',
        ]);
        $data['last_edited_by'] = auth()->id();

        // Handle file upload
        if ($request->hasFile('picture')) {
            $data['picture'] = $request->file('picture')
                ->store('posts', 'public'); // storage/app/public/posts/…
        }

        Post::create($data);   // assumes you have a Post model + fillable fields

        return redirect()->route('createPost')
            ->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('updatePost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'picture' => 'nullable|image',
            // …
        ]);

        if ($request->hasFile('picture')) {
            $validated['picture'] = $request->file('picture')->store('posts', 'public');
        }

        $post->update($validated);

        return redirect()->route('admin.post.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.post.index')
            ->with('success', 'Post deleted successfully.');
    }
}
