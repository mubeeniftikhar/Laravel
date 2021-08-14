

@extends("layouts.app")

@section("content")


    <h1>{{$post->title}}</h1>
    <img src="/image/{{$post->path}}"      alt="">


    @endsection
