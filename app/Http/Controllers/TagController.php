<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(10);
        return view('tag.index', ['tags' => $tags, 'Pagetitle' => 'Tags']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tag.create', ['Pagetitle' => 'Create New Tag']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //@todo: validate the request data and store the new tag
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tags = Tag::find($id);
        return view('tag.show', ['tag' => $tags, 'Pagetitle' => 'Tag Details']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tags = Tag::find($id);
        return view('tag.edit', ['tag' => $tags, 'Pagetitle' => 'Edit Tag']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //@todo: validate the request data and update the tag
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@todo: find the tag by id and delete it
    }
}
