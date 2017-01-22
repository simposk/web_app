@extends('layout')
@section('content')

<h1 style="text-align: center">Edit post</h1>

{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PATCH']) !!}
    @include('posts.form')
{!! Form::close() !!}

@stop