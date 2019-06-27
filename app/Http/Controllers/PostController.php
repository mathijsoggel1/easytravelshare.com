<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index',compact('posts',$posts));
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
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'headerimg' =>'',
            'user_id' => 'required',

        ]);
        $user = User::find($request->user_id);
        $headerimg = $request->file('headerimg');
        //dd($headerimg);
        if(!empty($headerimg)){
        $headerimg->move('images', $headerimg->getClientOriginalName());
        $headerimg = $request->headerimg->getClientOriginalName();

        }
        else{$headerimg = 'empty';}
        $post = Post::create(['user_id' => $request->user_id, 'title' => $request->title, 'headerimg' => $headerimg, 'content'=> $request->content]);
        return redirect('/'.$user->name);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
         return view('posts.show',compact('post',$post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post',$post));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
         $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:10',
            'headerimg' =>'',
            'user_id' => 'required',
            
        ]);

        $headerimg = $request->file('headerimg');
        if(!empty($headerimg)){
        $headerimg->move('images', $headerimg->getClientOriginalName());
        $post->headerimg = $request->headerimg->getClientOriginalName();
        }
        else{$headerimg = 'empty';}

        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        $request->session()->flash('message', 'Successfully modified the post!');
        $user = User::find($request->user_id);
        return redirect('/'.$user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,  Post $post)
    {
         $post->delete();
        $request->session()->flash('message', 'Successfully deleted the post');
        $user = User::find($post->user_id);
        return redirect('/'.$user->name);
    }
}
