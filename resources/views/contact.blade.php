

@extends("layouts.app")

@section("content")

    @if(count($post))
        <ul>
       @foreach($post as $posts)
                <li><a href="{{route('posts.show', $posts->id)}}">{{$posts->title}}</a></li>
       @endforeach

    @endif
        </ul>

    @stop

@section('footer')


@stop
