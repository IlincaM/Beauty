@extends('main')
@section('title','|About me')



@section('content')
<h1 class="subtitle">Write to me:)</h1>
<div class="row">
      <div class="col-md-8 col-md-offset-2">
          {{ Form::open(['route' => 'contacts.store', 'method' => 'POST']) }}
          {!! csrf_field() !!}
          <div class="row">
              <div class="col-md-6">
                  {{ Form::label('name', 'Name'),['class' => 'labelColor'] }}
                  {{ Form::text('name', null, ['class' => 'form-control',
                              'required' => '', 'maxlength' => '30']) }}
              </div>

              <div class="col-md-6">
                  {{ Form::label('email', 'Email'),['class' => 'labelColor'] }}
                  {{ Form::text('email', null, ['class' => 'form-control',
                              'required'=>'','type'=>'email']) }}
              </div>

              <div class="col-md-12">
                  {{ Form::label('message', 'Message'),['class' => 'labelColor'] }}
                  {{ Form::textarea('message', null, ['rows' => '5', 'class' => 'form-control']) }}

                  {{ Form::submit('Send message', ['class' => 'btn btn-color white  btn-block btn-h5-spacing btn-h1-spacing ']) }}
              </div>
          </div>

          {{ Form::close() }}
      </div>
  </div>
@endsection

