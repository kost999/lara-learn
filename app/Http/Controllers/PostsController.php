<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{
    public function index()
	{
		$posts = Post::latest()->get();

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

		Post::create([
			'title' => request('title'),
			'body' => request('body'),
		]);

		// And then redirect to the homepage
		return redirect('/posts');
	}
}
