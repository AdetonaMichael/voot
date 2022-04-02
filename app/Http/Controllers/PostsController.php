<?php

namespace App\Http\Controllers;

use App\Http\Requests\posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories', Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $image =  Storage::disk('s3')->url($request->image);
  
        Post::create([
          'title'=>$request->title,
          'description'=>$request->description,
          'content'=>$request->content,
          'published_at'=>$request->published_at,
          'image'=> $image,
        ]);

        session()->flash('success', 'Post Created Successfully...');
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($show_id)
    {
        $post = Post::find($show_id);
        return view('show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Tag $tag)
    {
        return view('posts.create')->with('post', $post)->with('tags', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title','description','published_at','content']);
        if($request->hasFile('image')){
            // $image = $request->image->store('posts'); (replace with the one below)
            $image = Storage::disk('s3')->url($request->image->store('posts', 's3'));
            $post->deleteImage();
            dd($image);
            $data['image'] = $image;
        }

        $post->update($data);
        session()->flash('success','Post Updated Successfully...');
        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->firstOrFail();
        if($post->trashed()){
            Storage::delete($post->image);
            $post->forceDelete();
            session()->flash('success', 'The Post has been Deleted');
            return redirect(route('posts.index'));
        }else{
          $post->delete();
          session()->flash('success', 'The Post has been trashed Successfull...');
          return redirect(route('trashed-posts.index'));
        }


    }
    public function trashed(){
         $trashed = Post::withTrashed()->get();
         return view('posts.index')->with('posts', $trashed);
    }
}
