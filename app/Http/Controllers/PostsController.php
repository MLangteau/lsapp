<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Post::all();  //  Returns in JSON format(an array in this case);
        // does not perform next return view;

//         $posts = Post::all();
//           is the same as
//         $posts = DB::select('SELECT * FROM posts');      // should use eloquent instead

//         $posts = Post::orderBy('ptitle','asc')->get();   //  ascending
//        return Post::where('ptitle','Post Two')->get();   //  should use return
//        $posts = Post::orderBy('ptitle','desc')->take(1)->get();   //  if add clauses, needs get()
//        $posts = Post::orderBy('ptitle','desc')->get();   //  if add clauses, needs get()

        $posts = Post::orderBy('created_at','desc')->paginate(10);  // only 1 (or more) per page
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
        $this->validate($request, [
            'ptitle' => 'required',
            'body'  => 'required'
        ]);

        //  Creates the Post
        $post = new Post;
        $post->ptitle = $request->input('ptitle');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return Post::find($id);  returns a single post JSON
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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
        $this->validate($request, [
            'ptitle' => 'required',
            'body'  => 'required'
        ]);

        //  Find the Post
        $post = Post::find($id);
        $post->ptitle = $request->input('ptitle');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  Deletes a Post
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post Removed');
    }
}
