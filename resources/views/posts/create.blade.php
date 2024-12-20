@extends('layouts.app')

@section('title', 'Create a Post')

@section('content')
    <h1>Create Post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection