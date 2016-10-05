@extends('main')
@section('title',"|$post->title")



@section('content')
<input type="hidden" name="post" value="post{{$post->id}}">
<div class="row">
    <div class="col-xs-11  col-sm-6 pArticleBody">
            <h2>{{$post->title}}</h2> 
            {{$post->body}}

  </div>
    <!-- Add clearfix for only the required viewport -->
      <div class="clearfix visible-xs"></div>
@if($post->type_of_animation===1)
@include('partials._carousel')
<script>

    var imgName = <?php echo $post->id; ?>

</script>

<script type="text/javascript" src=" {{ URL::asset('../public/js/carousel.js') }}"></script>

@elseif($post->type_of_animation===2)
@include('partials._youtube')
{{$video=$post->video}}
<!--<script>

    var youtube = {{$video}}

</script>-->
<script type="text/javascript" src=" {{ URL::asset('../public/js/youtube.js') }}"></script>
@else($post->type_of_animation===3)
@include('partials._altceva')


@endif




</div>


<hr>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h3><strong>Comment section</strong></h3>
         <h4 class="comment-count">Currently : {{ $post->comments()->count() }}
             <span class="glyphicon glyphicon-comment"></span></h4>
        @foreach($post->comments as $comment)
        <div class="comment wrappersC">
            <div class="author-info">
                <img src="{{ 'https://www.gravatar.com/avatar/' .
                     md5(strtolower(trim($comment->email))) . "?d=wavatar" }}" class="author-image">
                <div class="author-name">
                    <h4>{{ $comment->name }}</h4>
                    <p>{{ date('M j, Y - H:i ', strtotime( $comment->created_at )) }}</p>
                </div>
            </div>

            <div class="comment-content">
                {!! $comment->comment !!}
            </div>
        </div>
        @endforeach
    </div>
</div>

<hr>

</div>
<div class="row">
    <div id="comment-form" class="col-md-8 col-md-offset-2">
        {{ Form::open(['route' => ['comments.store', $post->id], 'method' => 'POST']) }}
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control',
                            'required' => '', 'maxlength' => '30']) }}
            </div>

            <div class="col-md-6">
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email', null, ['class' => 'form-control',
                            'required'=>'','type'=>'email']) }}
            </div>

            <div class="col-md-12">
                {{ Form::label('comment', 'Comment') }}
                {{ Form::textarea('comment', null, ['rows' => '5', 'class' => 'form-control']) }}

                {{ Form::submit('Add Comment', ['class' => 'btn btn-color white btn-block form-spacing-top']) }}
            </div>
        </div>

        {{ Form::close() }}
        @endsection
