<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class HomeController extends Controller
{
    // public function __construct(){
    //     $this->middleware(['auth', 'verified']);
    // }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   $search = request()->query('search');
        if($search){
            $posts = Post::where('title','LIKE',"%{$search}%")->paginate(6);
        }else{
            $posts = Post::paginate(6);
        }
        return view('home')->with('posts',$posts)->with('categories', Category::all())->with('tags', Tag::all());
    }

}
