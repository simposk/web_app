@extends('layout')
@section('content')

<div class="posts-index">
    <h1>Posts:</h1>
    <hr>
    @foreach ($posts as $post)
        <h1><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h1>
    @endforeach
</div>
@stop