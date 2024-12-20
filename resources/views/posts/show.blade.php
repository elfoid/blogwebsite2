@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p><strong>Posted by:</strong> {{ $post->users->name ?? 'Anon' }}</p>
    <p><strong>Created at:</strong> {{ $post->created_at->format('F j, Y') }}</p>
    <a href="{{ route('posts.edit', ['post' => $post->post_id]) }}">Edit Post</a>

    <h3>Comments</h3>
    @foreach($post->comments as $comment)
        <div>
            <p>{{ $comment->content }}</p>
            <p>By: {{ $comment->user->name ?? 'Anonymous' }}</p>
            <p>Posted: {{ $comment->created_at->diffForHumans() }}</p>
            <a href="{{ route('comments.edit', [
                'post_id' => $post->post_id, 
                'comment' => $comment->comment_id
            ]) }}">Edit Comment</a>
        </div>
    @endforeach

    @if($post->comments->isEmpty())
        <p>No comments yet.</p>
    @endif
    
    @if(Auth::user()->can_comment)
        <a href="{{ route('comments.create', ['post_id' => $post->post_id]) }}">Add Comment</a>
    @endif
    <a href="{{ route('posts.index') }}">Back to Posts</a> 
@endsection