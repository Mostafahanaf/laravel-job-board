<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $data = Post::paginate(10);

        return view('post.index', ['posts' => $data, 'Pagetitle' => 'Blog']);
    }

    function show($id){
        $post = Post::findOrFail($id);

        return view('post.show', ['post' => $post, 'Pagetitle' => $post->title]);
    }

    function create(){
        Post::factory(1000)->create();
        return redirect('/blog');
    }

    function delete(){
        Post::destroy(3);
        return redirect('/blog');
    }
}
