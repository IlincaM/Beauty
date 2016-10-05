@extends('main')
@section('title',"|Login")



@section('content')
<h1 class="subtitle">Login</h1>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open()!!}
         {{ csrf_field() }}
        {{Form::label('email','Email:'),['class' => 'labelColor']}}
        {{Form::email('email',null,['class' => 'form-control'])}}
        {{Form::label('password','Password:'),['class' => 'labelColor']}}
        {{Form::password('password',['class' => 'form-control'])}}
        <br>
        {{Form::checkbox('remember')}}{{Form::label('remember','Remember Me:')}}
        <br>
        {{Form::submit('Login',['class'=>'btn btn-color white btn-block'])}}
        {!! Form::close()!!}

    </div>
    
</div>
@endsection
