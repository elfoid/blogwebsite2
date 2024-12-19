@extends('layouts.app')

@section('title', 'Add Comment')

@section('content')
    <h1>Add Comment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('comments.store', ['post_id' => $post_id]) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="content">Your Comment:</label>
            <textarea name="content" id="content" class="form-control" rows="3" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>

    <a href="{{ route('posts.show', $post_id) }}">Back to Post</a>
@endsection