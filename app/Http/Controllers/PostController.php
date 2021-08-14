<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;

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
         return "this is the index";
    }

    public function contact()
    {
        $post = Post::all();
        //$people = ['mubeen','iftikhar','hussain','mehr'];
        return view('contact',compact('post'));
    }
    public function show_post($id,$name,$password)
    {
        return view('show_post', compact('id','name','password'));
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
        $input = $request->all();

        if($file = $request->file('file')) {

            $name = $file->getClientOriginalName();
            $file->move('image',$name);
            $input['path'] = $name;
        }

         Post::create($input);
        return redirect('/contact');

      /*   $this->validate($request, [
         'title'=> 'required',
         'content'=> 'required'
         ]);

           Post::create($request->all());
          return redirect('/contact');*/



           // $post = new Post;
           // $post->title = $request->title;
           // $post->save();

       // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findorFail($id);
        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        return view('posts.edit',compact('post'));
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
        $post =  Post::findorFail($id);
        $post->update($request->all());
        return redirect('/contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =  Post::findorFail($id);
        $post->delete();
        return redirect('/contact');
    }
}
