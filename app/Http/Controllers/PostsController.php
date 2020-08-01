<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;
use Session;
class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the user's input
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        // save data
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();
        $post->save();

        Session::flash('success', 'Post successfully added!');
        return redirect('/posts');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(!$post->checkAuth($post->user_id)) {
            Session::flash('error', 'Sorry my friend');
            return redirect('/posts');
        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        // find the post
        $post = Post::find($id);
        if(!$post->checkAuth($post->user_id)) {
            Session::flash('error', 'Sorry my friend');
            return redirect('/posts');
        }

        // save data
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        Session::flash('success', 'Post successfully updated!');
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(!$post->checkAuth($post->user_id)) {
            Session::flash('error', 'Sorry my friend');
            return redirect('/posts');
        }
        
        $post->delete();
        Session::flash('success', 'Post successfully deleted!');
        return redirect('/posts');
    }
}
