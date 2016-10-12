
@extends('main')
@section('title', '|View Articles')
@section('content')
<div class="allPost">
    <div class="row">
        <div class="col-md-8">

            <h1 class="white">{{ $post->title }}</h1>
            <p class='lead white'>{{ $post->body }}</p>
            <div  >

                <?php
                $img = URL::asset('images/' . $post->img);

                echo "<img src=" . $img . " class='img-responsive imgIndex'>";
                ?>
            </div>
            <div id="backend-comments">
                <h3 class="white">Comments : <small>{{ $post->comments()->count() }} total</small></h3>
                <table class="table">
                    <thead>
                        <tr class="white">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comments</th>
                            <th width="70px"></th>
                        </tr>
                    </thead>

                    <tbody class="white">
                        @foreach ($post->comments as $comment)
                        <tr class="white">
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{!! $comment->comment !!}</td>
                            <td>
                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ date('M j, Y h:ia',strtotime($post->created_at))  }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{date('M j, Y h:ia',strtotime($post->updated_at) ) }}</p>
                </dl>
                <dl class="dl-horizontal">
                    <a href="{{ action('PostController@index') }}"><span><<< See All Posts</span></a> 
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class' => 'btn btn-primary btn-block' )) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' =>['posts.destroy',$post->id], 'method' => 'DELETE'])!!}
                        {!! Form::submit('Delete',array('class' => 'btn btn-danger btn-block' )) !!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
