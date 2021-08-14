@extends("layouts.app")

@section("content")
    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostController@store', 'files'=>true]) !!}


    <div class="form-group">
        {!! Form::label('title', 'title' )!!}
        {!! Form::text('title',null,  ['class'=>'form-control' ]) !!}

    </div>


    <div class="form-group">
        {!! Form::label(  'content',  'content'        )!!}
        {!! Form::text('content'   ,null,  ['class'=>'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::file( 'file', ['class'=>'form-control' ]) !!}

    </div>

     <ul>
         @foreach($errors->all() as $error)
             <l1>{{$error}}<br></l1>
         @endforeach
     </ul>



    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>



    {!! Form::close() !!}









    @yield('footer')
