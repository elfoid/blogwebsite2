@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p><strong>Posted by:</strong> {{ $post->user->name ?? 'Unknown User' }}</p>
    <!-- <p><strong>Created at:</strong> {{ $post->created_at->format('F j, Y') }}</p> -->
    
    <a href="{{ route('posts.index') }}">Back to Posts</a> 
@endsection






<!-- @extends('layouts.app') //Assuming you use a layout

@section('title', 'Post Details')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>
    <p><strong>Posted by:</strong> {{ $post->user->name ?? 'Unknown User' }}</p>
    <p><strong>Created at:</strong> {{ $post->created_at->format('F j, Y') }}</p>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection -->