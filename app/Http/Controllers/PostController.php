<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->with('users')->paginate(10), 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $userId = Auth::id();
        $post = new Post();
        $post->post_id = Str::uuid();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->user()->user_id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($post_id)
    {
        //dd($post_id);

        $post = Post::find($post_id);
        if(!$post){
            abort(404);
        }
        return view('posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        /*$request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()->route('posts.show', $post)->with('success', 'Post updated successfully.'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //$post->delete();
        //return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
