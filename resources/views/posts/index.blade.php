@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Posts</h1>
    </div>
    @if(count($posts) > 1)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->ptitle}}</a></h3>
                <h3>{{$post->body}}</h3>
                <small>Written on {{$post->created_at}}</small>
            </div>
        @endforeach
    @else
        <p>No Posts Found in the database</p>
    @endif
@endsection