<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('Comment.index', ['comments' => $comments, 'Pagetitle' => 'Comments']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Comment.create', ['Pagetitle' => ' create new Comments']);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //@todo: validate the request data
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comment = Comment::find($id);
        return view('Comment.show', ['comment' => $comment, 'Pagetitle' => 'Comment Details']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view('Comment.edit', ['comment' => $comment, 'Pagetitle' => 'Edit Comment']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //@todo: validate the request data and update the comment
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@todo: find the comment by id and delete it
    }
}
