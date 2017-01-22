@extends('layout')
@section('content')

<div class="posts-show">
    <h1>{{ $post->title }}</h1> 
    <hr>
    <p>{!! nl2br($post->body) !!}</p>
</div>

<hr>

<div class="links">
    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
        <small><a href="{{ route('posts.index') }}">Back</a></small>
        <small><a href="{{ route('posts.edit', $post->id) }}">Edit</a></small>
        <small><button type="submit" class="delete">Delete</button></small>
    {!! Form::close() !!}
</div>
@stop