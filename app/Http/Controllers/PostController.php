<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //create a variable and store all the blog posts in it from the database
        $posts = Post::all();

        //return a view and pass in  the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //validate the data
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug',
            'body' => 'required',
            'type_of_animation' => 'required',
            'type_of_article' => 'required',
            'img' => 'required|image',
            'imgC1' => 'sometimes|required|image',
            'imgC2' => 'sometimes|required|image',
            'imgC3' => 'sometimes|required|image',
            'imgC4' => 'sometimes|required|image',
            'smth' => 'sometimes|required|image'
        ));
        //store in the database
        $post = new Post;
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->title = $request->title;
        $post->type_of_animation = $request->type_of_animation;
        $post->type_of_article = $request->type_of_article;
        $post->save();

        $request->hasFile('img');
        $image = $request->file('img');
        $filename = $post->id . "Index." . $image->clientExtension();
        $path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(500, 187)->save($path);
        $post->img = $filename;

        if ($request->hasFile('imgC1')) {
            $image = $request->file('imgC1');
           
            $filename = $post->id . "_1.jpg";
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(500, 187)->save($path);
            $post->imgC1 = $filename;
        }
        if ($request->hasFile('imgC2')) {
            $image = $request->file('imgC2');
            $filename = $post->id . "_2.jpg";
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(500, 187)->save($path);
            $post->imgC2 = $filename;
        }
        if ($request->hasFile('imgC3')) {
            $image = $request->file('imgC3');
            $filename = $post->id . "_3.jpg";
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(500, 187)->save($path);
            $post->imgC3 = $filename;
        }
        if ($request->hasFile('imgC4')) {
            $image = $request->file('imgC4');
            $filename = $post->id . "_4.jpg";
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(500, 187)->save($path);
            $post->imgC4 = $filename;
        }
        if ($request->hasFile('smth')) {
            $image = $request->file('smth');
           
            $filename = $post->id . "_nails.jpg";
            $path = public_path('images/' . $filename);
            Image::make($image->getRealPath())->resize(100, 91)->save($path);
            $post->smth = $filename;
        }
        if ($request->input('video')) {
            $post->video = $request->video;
        }


        $post->save();


        Session::flash('success', 'The artice was successfully save');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //find the post in the db and save it as a variabe
        $post = Post::find($id);

        //retutn the view and pass in the variable we previosly created
        return view('posts.edit')->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //Validate the data
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:3|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }
        //Save the data to the db
        $post->title = $request->input('title');
        $post->slug = $request->slug;

        $post->body = $request->input('body');
        $post->save();

        //set flash data with success msg
        Session::flash('success', 'This article was succesfully saved.');
        //redirect with flash data to posts.show
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //find the article
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The article was successfully deleted.');
        return redirect()->route('posts.index');
    }

}
