<?php

namespace App\Http\Controllers;

use App\Http\Requests\posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }
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

        // $image = $request->image->store('posts', 's3');
        $image = $request->image->store('posts');
        $post = Post::create([
            'title'=> $request->title,
            'description'=>$request->description,
            'content'=>$request->content,
            'published_at'=>$request->published_at,
            'image'=> $image,
            'category_id'=>$request->category,
            'user_id'=>auth()->user()->id,
        ]);

        if($request->tags){
            $post->tags()->attach($request->tags);
       }

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
        return view('show')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories', Category::all())->with('tags', Tag::all());
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
            $image = $request->image->store('posts');
            $post->deleteImage();
            $data['image'] = $image;
        }
        if($post->tags){
            $post->tags()->sync($request->tags);
        }

        $post->update($data);
        session()->flash('success', 'Post Updated Successfully....');
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
            $post->deleteImage();
            $post->forceDelete();
            session()->flash('success', 'The Post has been Deleted Successfully..!');
            return redirect(route('posts.index'));
        }else{
          $post->delete();
          session()->flash('success', 'The Post has been trashed Successfull...');
          return redirect(route('trashed-posts.index'));
        }
    }
    public function trashed(){
         $trashed = Post::onlyTrashed()->get();
         return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id){
     $post= Post::withTrashed()->where('id', $id)->firstOrFail();
     $post->restore();
     session()->flash('success', 'Post Restored Successfully...');
     return redirect()->back();
    }

    public function category($categoryid){
        $category = Category::find($categoryid);

        $search = request()->query('search');
        if($search){
            $posts = $category->posts()->where('title', 'like','%'.$search.'%')->paginate(4);
        }else{
            $posts = $category->posts()->paginate(6);
        }
        return view('blog.category')
        ->with('category', $category)
        ->with('tags', Tag::all())
        ->with('categories', Category::all())
        ->with('posts', $posts);
    }
    public function tag($tagid){
        $tag = Tag::find($tagid);
        return view('blog.tag')
        ->with('tags', Tag::all())
        ->with('categories', Category::all())
        ->with('tag', $tag)
        ->with('posts', $tag->posts()
        ->paginate(6));
    }
}
