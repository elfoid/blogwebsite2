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
        // Validate the user is allowed to ccreate a comment
        $this->authorize('create', Comment::class);


        // Validate the content has not been emptied
        $request->validate([
            'content' => 'required'
        ]);
    
        // Store the comment, now auth and validation are good.
        $comment = new Comment();
        $comment->comment_id = Str::uuid();
        $comment->content = $request->content;
        $comment->post_id = $post_id;

        // User from current session
        $comment->user_id = auth()->id();
        $comment->save();
    
        return redirect()->route('posts.show', $post_id)->with('success', 'Comment added successfully');
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

        $request->validate([
            'content' => 'required'
        ]);

        // dd([
        //     'authenticated_user_id' => auth()->id(),
        //     'comment_user_id' => $comment->user_id,
        //     'are_equal' => auth()->id() === $comment->user_id,
        //     'request_method' => $request->method(), // Verify it's a PUT/PATCH request
        //     'route_name' => $request->route()->getName() // Check the route name
        // ]);

        # Before updating, check if current user can do this by policy
        $this->authorize('update', $comment);


        // Auth and Validation are good, save the comment update
        $comment->content = $request->content;
        $comment->save();
    
        // back to the post
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
