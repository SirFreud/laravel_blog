<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Posts;
use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Posts $posts)
    {
//        return session('message');
        // dd($posts);
        $posts = $posts->all();
        // $posts = (new \App\Repositories\Posts)->all();
        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get(); 
            
        $archives = Post::archives();
            // return $archives;
        return view('posts.index', compact('posts', 'archives'));
    }

    public function show(Post $post)
    {
        $archives = Post::archives();
        return view('posts.show', compact('post', 'archives'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // Read docs on this, very important
        $this->validate(request(), [
            'title' => 'required|min:10',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has been published!');

        return redirect('/');
    }
}
