@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    {{--{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}--}}
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('ptitle', 'Title')}}
        {{Form::text('ptitle', $post->ptitle, ['class' => 'form-control', 'placeholder' => 'Meal Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}}
        {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Foods in Meal'])}}
    </div>
    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection