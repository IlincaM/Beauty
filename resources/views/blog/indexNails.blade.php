@extends('main')
@section('title',"|Blog")



@section('content')

@foreach($posts as $post)
@if($post["type_of_article"]===3)
<div class="row">
    <div class="  col-sm-6 pArticleBodyIndex">
        <h2 class="h2centre">{{$post->title}}</h2> 
        <p class="white">{{  str_limit($post->body, 300, "(...)") }}
            <a  href="{{ url('blog/'.$post->slug) }} " class="btn btn-color white  btn-sm" >Read More</a>
        </p>
        
    </div>
    <br>
    <?php
    $img = URL::asset('images/' . $post->img);

    
    ?>
    <div class="  col-sm-6 pArticleBodyImg" >
    <?php echo "<img src=" . $img . " class='img-responsive imgIndex'>";?>
    </div>
</div>
@endif


@endforeach

@endsection
