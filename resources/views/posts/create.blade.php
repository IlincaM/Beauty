@extends('main')
@section('title', '|Create New Post')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection
@section('content') 
<div class="row">
    <div class='col-md-8 col-md-offset-2'>
        <h1>Create New Post</h1>
        <hr>
        {!! Form::open(array('route' => 'posts.store','data-parsley-validate' => ''))!!}
        {{Form::label('title','Title:')}}
        {{Form::text('title', null,array('class' => 'form-control', 'required' => '','maxlenght' => '255')) }}
        {{Form::label('slug','Slug:')}}
        {{Form::text('slug',null,array('class' => 'form-control','required' => '','minlength'=>'3','maxlength'=>'255'))}}
        {{Form::label('body','Body:')}}
        {{Form::textarea('body',null,array('class' => 'form-control','required' => ''))}}
        {{Form::label('type_of_animation','Type of animation:')}}

        {{ Form::select('type_of_animation', [
                 1 => 'carousel',
                 2 => 'video',
                 3 => 'something else']
) }}
        {{Form::label('type_of_article','Type of article:')}}

        {{ Form::select('type_of_article', [
                 1 => 'hair styles',
                 2 => 'makeup',
                 3 => 'nails']
) }}
        {{Form::submit('Create New Post',array('class' => 'btn btn btn-success bt-lg btn-block'))}}
        {!! Form::close() !!}

    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('js/parsley.min.js') !!}

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            