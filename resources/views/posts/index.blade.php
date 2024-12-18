
@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1>All Posts</h1>

    @if ($posts->count())
        <ul>
            @foreach ($posts as $post)
                <li>
                    <!-- Link to the 'show' route -->
                    <a href="{{ route('posts.show', $post->post_id) }}">
                        {{ $post->title }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Pagination Links -->
        {{ $posts->links() }}
    @else
        <p>No posts available.</p>
    @endif
@endsection








<!-- @extends('layouts.app')

@section('title', 'All Posts')

@section('content')
    <h1>All Posts</h1>
    @foreach ($posts as $post)
        <p>{{ $post->title }} - {{ $post->user->name ?? 'Unknown User' }}</p>
    @endforeach

    {{ $posts->links() }}
@endsection -->