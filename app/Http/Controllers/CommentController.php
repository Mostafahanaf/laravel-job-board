<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function index(){
        $data = Comment::all();

        return view('Comment.index', ['comments' => $data, 'Pagetitle' => 'Comments']);
    }
        function create(){
        // Comment::create([
        //     'author' => 'Motafa Hanafy',
        //     'content' => 'This is another test comment.',
        //     'post_id' =>3,
        // ]);

        Comment::factory(5)->create();
        return redirect('/comments');
        }
}
