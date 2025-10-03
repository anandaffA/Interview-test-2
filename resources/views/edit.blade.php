@extends('layout')
@section('content')
<h1 class="text-center">Add Post</h1>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="title" class="form-control mb-3" placeholder="{{ $post->title}}" value={{ $post->title}}">
    
    <textarea name="body" class="form-control mb-3" rows="5" placeholder="Body">{{ $post->body }}</textarea>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
</form>

@endsection