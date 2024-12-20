
@extends('layouts.app')

@section('title', 'View All Posts')

@section('content')
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

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