@extends('layout')

@section('content')
<h1 class="text-center">Post Detail</h1>

<section class="">
    <h1>
        {{ $post->title }}
    </h1>
    <p>
        {{ $post->body }}
    </p>
</section>

<a href="/" class="card-link">Back</a>

@endsection
