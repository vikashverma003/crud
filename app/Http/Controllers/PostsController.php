<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Post;

class PostsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    	//$post = Post::all();
        
       // $post =  Post::orderBy('title', 'asc')->get();

    	//$post =Post::orderBy('title', 'desc')->take(1)->get();

    	//$post =  Post::orderBy('title', 'asc')->paginate(1);

        // here $post is used for edit link and also used for the deletion

        $post =  Post::orderBy('created_at', 'desc')->paginate(5);


    	return view('posts.index')->with('post', $post);

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

            'title' =>'required',

            'body'=>'required',

            'cover_image'=>'image|nullable'

            ]);


        if($request->hasFile('cover_image'))

        {

            // get filename with extension
            $filenameWithExt= $request->file('cover_image')->getClientOriginalName();

            // get just filename below is just pure php
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // get the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            // filename to store 
            $fileNameToStore =   $filename  .'_'.time() .'_' .$extension ;

            // upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore );





        }

        else
        {

            $fileNameToStore = 'noimage.jpg';
        }


        $post = new Post;

        $post->title = $request->input('title');

        $post->body = $request->input('body');

        $post->user_id = auth()->user()->id;

        $post->cover_image  =   $fileNameToStore;

        $post->save();

        return redirect('/posts')->with('success', 'post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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

        /* it will prevent the editing the posts from diffrent id */
        if(auth()->user()->id !==  $post->user_id)

        {

         return redirect('/posts')->with('error', 'Unauthrorized access');

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
        
                $this->validate($request, [

            'title' =>'required',

            'body'=>'required'

            ]);

        $post = Post::find($id);

        $post->title = $request->input('title');

        $post->body = $request->input('body');
        $post->save();

        return redirect('/posts')->with('success', 'post updated successfully');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // echo $id;

        $post = Post::find($id);


        if(auth()->user()->id !==  $post->user_id)

        {

         return redirect('/posts')->with('error', 'Unauthrorized access');

        }

        $post->delete();

        return redirect('/posts')->with('success', 'post Removed successfully');





    }
}
