<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Session;
use App\Services\Pagination;

class PostController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //create a variable and store all the blog posts in it from the database
//        $posts = Post::paginate(4)->appends($request->get('page'));
//Get current page form url e.g. &page=6
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        $posts2=Post::all();
        
        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = $posts2->slice(($currentPage - 1) * 4, 4)->all();


        //Create our paginator and pass it to the view
        $posts = new \Illuminate\Pagination\LengthAwarePaginator($currentPageSearchResults, count($posts2), 4);
        $posts->setPath($request->url());
        $posts->appends($request->except(['page']));
        //return a view and pass in  the above variable
        return view('posts.index')->with('posts',$posts);
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
            'body' => 'required'
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

    /**
     * This method is responsible for paginating the array of objects received as a parameter. 
     * 
     * @param array $post --> represents an array of objects (articles for the blog section)
     * @param array $op --> the array of options for the query
     * @param Request $request
     * @author Bianca Moncea <bianca.moncea@evozon.com>
     * 
     * @return array of objects representing the paginated articles for each page
     */
    public function paginateArticles($post, $op, Request $request)
    {

        //Get current page form url e.g. &page=6
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage();

        
        
        //Slice the collection to get the items to display in current page
        $currentPageSearchResults = Post::slice(($currentPage - 1) * 4, 4)->all();


        //Create our paginator and pass it to the view
        $posts = new \Illuminate\Pagination\LengthAwarePaginator($currentPageSearchResults, count(Post::all()), 4);
//        $this->paginatedSearchResults->setPath($request->url());
        $posts->appends($request->except(['page']));

        return $this->paginatedSearchResults;
    }
}
