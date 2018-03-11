<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\Posts;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

	public function index(Posts $posts)
	{
//		$posts = Post::latest()
//			->filter(request(['month', 'year']))
//			->get();

//		$posts = (new \App\Repositories\Posts())->all();

		$posts = $posts->all();

		return view('posts.index', compact('posts'));
	}

	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	}

	public function create()
	{
		return view('posts.create');
	}

	public function store()
	{
		// Create a new post
//		$post = new Post();
//		$post->title = request('title');
//		$post->body = request('body');

		// Save it to the database
//		$post->save();

		$this->validate(request(), [
			'title' => 'required',
			'body' => 'required',
		]);


		auth()->user()->publish(
			new Post(request(['title', 'body']))
		);


//		Post::create([
//			'title' => request('title'),
//			'body' => request('body'),
//			'user_id' => auth()->id(),
//		]);

		// And then redirect to the homepage
		return redirect()->home();
	}
}
