@extends("layouts.app")

@section("content")
    <h1>Edit Post</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostController@update', $post->id]]) !!}


    <div class="form-group">
        {!! Form::label('title', 'title' )!!}
        {!! Form::text('title',null,  ['class'=>'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('Update Post', ['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}









    @yield('footer')
