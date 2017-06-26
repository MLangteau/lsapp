@extends('layouts.app')

@section('content')
   <h1>Create Page</h1>
   {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
      <div class="form-group">
         {{Form::label('ptitle', 'Title')}}
         {{Form::text('ptitle', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
      </div>
      <div class="form-group">
         {{Form::label('ptitle', 'Body')}}
         {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
      </div>
      {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
   {!! Form::close() !!}
@endsection