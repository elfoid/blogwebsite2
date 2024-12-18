@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1>All Posts</h1>
    @foreach ($posts as $post)
        <p>{{ $post->title }} - {{ $post->user->name ?? 'Unknown User' }}</p>
    @endforeach

    {{ $posts->links() }}
@endsection