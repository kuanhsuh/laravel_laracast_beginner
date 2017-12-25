<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repositories\Posts;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(\App\Tag $tag = null)
    // public function index(Posts $posts)
    {
        return $tag->posts;
        // return session('message');
        // $posts = (new \App\Repositories\Posts)->all();
        $posts = Post::latest();

        if ($request = request(['month', 'year'])) {
            $posts->filter($request);
        }

        // $posts = $posts->get();
        // $posts = Post::latest()
        //     ->filter(request(['month', 'year']))
        //     ->get();

        // $posts = Post::orderBy('created_at', 'desc')->get();
        // $posts = Post::latest();
        // if($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }
        // $posts = $posts->get();
        // $posts = $posts->all();

        // $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        //     ->groupBy('year', 'month')
        //     ->orderByRaw('min(created_at) desc')
        //     ->get()
        //     ->toArray();
        // $archives = Post::archives();
        // $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    public function show(Post $post)
    {
        // $post = Post::find($id);
        return view('posts.show', compact('post'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required|min:4',
            'body' => 'required'
        ]);
        // dd(request(['title', 'body']));
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');
        // $post->save();

        // method 2
        auth()->user()->publish(
            new Post(request(['title', 'body'])))
        ;

        //method 1
        // Post::create([
        //     'title' =>request('title'),
        //     'body' =>request('body'),
        //     'user_id' => auth()->user()->id
        // ]);
        session()->flash('message', 'Your post has been published');
        return redirect('/');
        // return view('posts.create');
    }
}
