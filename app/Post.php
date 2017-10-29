<?php

namespace App;

class Post extends Model
{
	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function addComment($body)
	{
		$this->comments()->create([
			'body' => $body,
			'user_id' => auth()->id(),
		]);

//		Comment::create([
//			'body' => $body,
//			'post_id' => $this->id,
//		]);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
