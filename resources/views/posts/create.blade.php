@extends('main')
@section('title', '|Create New Post')
@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@endsection
@section('content') 
<div class="row">
    <div class='col-md-8 col-md-offset-2'>
        <h1 class="white">Create New Post</h1>
        <hr>
        {!! Form::open(array('route' => 'posts.store','data-parsley-validate' => '','files'=>true))!!}
        {{Form::label('title','Title:',['class' => 'labelColor'])}}
        {{Form::text('title', null,array('class' => 'form-control', 'required' => '','maxlenght' => '255')) }}
        {{Form::label('slug','Slug:',['class' => 'labelColor'])}}
        {{Form::text('slug',null,array('class' => 'form-control','required' => '','minlength'=>'3','maxlength'=>'255'))}}
        {{Form::label('img','Upload Image:',['class' => 'labelColor'])}}
        {{Form::file('img',array('class' => 'labelColor'))}}

        {{Form::label('body','Body:',['class' => 'labelColor'])}}
        {{Form::textarea('body',null,array('class' => 'form-control','required' => ''))}}
        {{Form::label('type_of_article','Type of article:',['class' => 'labelColor'])}}

        {{ Form::select('type_of_article', [
                 1 => 'hair styles',
                 2 => 'makeup',
                 3 => 'nails']
) }}

        {{Form::label('type_of_animation','Type of animation:',['class' => 'labelColor'])}}

        <?php
        $options = [
            '' => 'Please select',
            1 => 'carousel',
            2 => 'video',
            3 => 'something else'
        ];
        ?>    
        {{ Form::select('type_of_animation', $options, ['id' => 'type_of_animation']) }}
        <!--This should appear if you are a carousel (option 1 in the select box)-->
        <div id="carouselOption" class="field">
            <div class="col-md-6">
                <hr>
                {{Form::label('imgC1','Upload First Image for Carousel:',['class' => 'labelColorOptions'])}}
                {{Form::file('imgC1',array('class' => 'labelColor'))}}
                <br>
                {{Form::label('imgC2','Upload Second Image for Carousel:',['class' => 'labelColorOptions'])}}
                {{Form::file('imgC2',array('class' => 'labelColor'))}}
                <hr>
            </div>

            <div class="col-md-6">
                <hr>
                {{Form::label('imgC3','Upload Third Image for Carousel:',['class' => 'labelColorOptions'])}}
                {{Form::file('imgC3',array('class' => 'labelColor'))}}
                <br>
                {{Form::label('imgC4','Upload Fourth Image for Carousel:',['class' => 'labelColorOptions'])}}
                {{Form::file('imgC4',array('class' => 'labelColor'))}}
                <hr>
            </div>
        </div>

        <!--This should appear if you are a video (option 2 in the select box)-->
        <div id="videoOption" class="field">
            <hr>
            {{Form::label('video','URL Video:',['class' => 'labelColorOptions'])}}
            {{Form::text('video',null,array('class' => 'form-control'))}}
            <hr>
        </div>

        <!--This should appear if you are a something else (option 3 in the select box)-->
        <div id="smthOption" class="field">
            <hr>
            {{Form::label('smth','Upload one image:',['class' => 'labelColorOptions'])}}
            {{Form::file('smth',array('class' => 'labelColor'))}}
            <hr>
        </div>




        {{Form::submit('Create New Post',array('class' => 'btn btn btn-color white bt-lg btn-block'))}}
        {!! Form::close() !!}

    </div>

</div>
@endsection

@section('scripts')
{!! Html::script('js/parsley.min.js') !!}
{!! Html::script('js/addUploadForm.js') !!}

@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            