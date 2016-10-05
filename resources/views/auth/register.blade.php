@extends('main')
@section('title',"|Register")



@section('content')
<h1 class="subtitle">Register</h1>

<div class="row">
    <div class="col-md-6 col-md-offset-3">
        {!! Form::open()!!}
        {{Form::label('name','Name:',['class' => 'labelColor'])}}
        {{Form::text('name',null,['class' => 'form-control'])}}
        
        {{Form::label('email','Email:',['class' => 'labelColor'])}}
        {{Form::email('email',null,['class' => 'form-control'])}}
        
        {{Form::label('password','Password:',['class' => 'labelColor'])}}
        {{Form::password('password',['class' => 'form-control'])}}
        
        {{Form::label('password_confirmation','Confirm Password:')}}
        {{Form::password('password_confirmation',['class' => 'form-control'])}}
        
        {{Form::submit('Register',['class'=>'btn btn-color white btn-block form-spacing-top '])}}
        {!! Form::close()!!}

    </div>
    
</div>
@endsection
