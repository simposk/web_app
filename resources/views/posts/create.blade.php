@extends('layout')
@section('content')

<h1 style="text-align: center">Create a new post</h1>

{{-- !!! neveikia forma Post --}}

{!! Form::open(['route' => ['posts.store'], 'method' => 'POST']) !!}
    @include('posts.form')
{!! Form::close() !!}
</form>

@stop