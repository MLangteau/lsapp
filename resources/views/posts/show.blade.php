@extends('layouts.app')

@section('content')
    <a href="/posts/" class="btn btn-default">Go Back</a>
        <h1>{{$post->ptitle}}</h1>
        <div>
            {!!$post->body!!}<hr>
        </div>
        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
        <hr>
        {{--if user is authorized, they can see all posts--}}
        @if(!Auth::guest())
            {{--the user has to match the post user's ID to edit or delete--}}
            @if(!Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!!Form::close()!!}
            @endif
        @endif
@endsection