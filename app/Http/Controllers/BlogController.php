<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
class BlogController extends Controller
{
    
    public function getIndexHair(){
        //create a variable and store all the blog posts in it from the database
        $posts = Post::all();

        //return a view and pass in  the above variable
        return view('blog.indexHair')->withPosts($posts);
    }
    /**
     * 
     * @return type
     */
    public function getIndexMakeUp(){
        //create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(2);

        //return a view and pass in  the above variable
        $posts = Post::all();
        return view('blog.indexMakeUp')->withPosts($posts);
    }
     public function getIndexNails(){
        //create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(2);

        //return a view and pass in  the above variable
        $posts = Post::all();
        return view('blog.indexNails')->withPosts($posts);
    }
    public function getSingle($slug){
        //fetch from the DB based on slug
        $post = Post::where('slug','=',$slug)->first();
        //return the view and pass in the post object
        return view('blog.single')->withPost($post);
    }
}
