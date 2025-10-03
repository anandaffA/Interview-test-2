@extends('layout')

@section('content')
<h1 class="text-center">Posts</h1>
<a href="/add" class="btn btn-primary mb-3">Create Post</a>

<section class="">
    <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
        @foreach ($posts as $post)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit($post->body, 64)  }}</p>
                    <a href="/post/{{ $post->id }}" class="card-link">Detail</a>
                    <a href="/edit/{{ $post->id }}" class="card-link">Edit</a>
                    
                    <form action="{{ route('posts.delete', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
            @endforeach
    </div>
</section>
@endsection
