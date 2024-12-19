<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($post_id)
    {
        return view('comments.create', compact('post_id'));
    }

    public function store(Request $request, $post_id)
    {
        $request->validate([
            'content' => 'required'
        ]);
    
        $comment = new Comment();
        $comment->comment_id = Str::uuid();
        $comment->content = $request->content;
        $comment->post_id = $post_id;
        $comment->user_id = auth()->id();
        $comment->save();
    
        return redirect()->route('posts.show', $post_id)
                        ->with('success', 'Comment added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
