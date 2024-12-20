@extends('layouts.app')

@section('title', 'Edit a Comment')

@section('content')
    <h1>Edit a Comment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('comments.update', ['post_id' => $post_id, 'comment' => $comment->comment_id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="content">Your Comment:</label>
            <textarea name="content" id="content" class="form-control" rows="3" required>{{ old('content', $comment->content) }}</textarea>
        </div>
        <button type="submit">Save Comment</button>
    </form>
    <a href="{{ route('posts.show', $post_id) }}">Back to Post</a>
@endsection