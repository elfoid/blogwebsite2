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
    public function edit($post_id, $comment)
    {
        $comment = Comment::findOrFail($comment);

        # Check if current user is allowed to do this
        $this->authorize('edit', $comment);

        return view('comments.edit', compact('comment', 'post_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post_id, $comment)
    {
        $comment = Comment::findOrFail($comment);

        // dd([
        //     'authenticated_user_id' => auth()->id(),
        //     'comment_user_id' => $comment->user_id,
        //     'are_equal' => auth()->id() === $comment->user_id,
        //     'request_method' => $request->method(), // Verify it's a PUT/PATCH request
        //     'route_name' => $request->route()->getName() // Check the route name
        // ]);

        # Before updating, check if current user can do this by policy
        $this->authorize('update', $comment);


        $request->validate([
            'content' => 'required'
        ]);
    
        $comment->content = $request->content;
        $comment->save();
    
        return redirect()->route('posts.show', $post_id)->with('success', 'Comment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
