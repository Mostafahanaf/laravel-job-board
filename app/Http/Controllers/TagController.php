<?php

namespace App\Http\Controllers;


use App\Models\tag;
use App\Models\Post;
use Illuminate\Http\Request;

class TagController extends Controller
{
    function index(){
        $data = Tag::all();

        return view('tag.index', ['tags' => $data, 'Pagetitle' => 'Tags']);
    }

    function create(){
        Tag::create([
            'title' => 'css',
        ]);

        return redirect('/tags');
        }

        function testmanytomany(){
            // $post4 = Post::find(4);
            // $post5 = Post::find(5);

            // $post4->tags()->attach([1,3]);
            // $post5->tags()->attach([2]);

            // return response()->json(([
            //     'post4' => $post4->tags,
            //     'post5' => $post5->tags
            // ]));

            $tag = Tag::find(2);
            $tag->posts()->attach([2]);
            return response()->json(([
                'tag' => $tag->title,
                'posts' => $tag->posts
            ]));
        }

}
