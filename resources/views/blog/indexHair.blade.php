@extends('main')
@section('title',"|Blog")



@section('content')
<h1 class="subtitle">Love your hair</h1>
@foreach($posts as $post)
@if($post["type_of_article"]===1)
 <div class="container-fluid">
    <p></p>
    <div class="row">

        <div class="col-sm-12 col-md-12 articles">
            <article>
                <h2 class="text-center white">{{$post->title}}</h2>


            </article>
            <hr>
            <p class="white">{{  str_limit($post->body, 270, "(...)") }} </p> 
            <a  href="{{ url('blog/'.$post->slug) }} " class="btn btn-color white  btn-sm" >Read More</a>
        </div>
        
        
        
        
    </div>
</div>
@endif


@endforeach

@endsection
