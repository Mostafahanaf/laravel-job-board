<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\BlogPostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::latest()->paginate(10);

        return view('post.index', ['posts' => $data, 'Pagetitle' => 'Blog']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create', ['Pagetitle' => 'blog-Create Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->save();

        return redirect('/blog')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'Pagetitle' => $post->title]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post, 'Pagetitle' => 'Blog-Edit Post:' . $post->title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findorfail($id);
        $post->title = $request->input('title');
        $post->author = $request->input('author');
        $post->body = $request->input('body');
        $post->published = $request->has('published');
        $post->save();

        return redirect('/blog')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return redirect('/blog')->with('success','');
    }
}
