@extends('main')
@section('title',"|Blog")



@section('content')
@foreach($posts as $post)
@if($post["type_of_article"]===1)
 <div class="container-fluid">
    <p></p>
    <div class="row">

        <div class="col-sm-12 col-md-12 articles">
            <article>
                <h2 class="text-center">{{$post->title}}</h2>


            </article>
            <hr>
            <p>{{  str_limit($post->body, 270, "(...)") }} </p> 
            <a  href="{{ url('blog/'.$post->slug) }} " class="btn btn-info btn-xs" >Read More</a>
        </div>
        
        
        
        
    </div>
</div>
@endif


@endforeach

@endsection
