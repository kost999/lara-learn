<?php

namespace App\Http\Controllers;

class SessionsController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'destroy']);
	}

	public function create()
	{
		return view('sessions.create');
	}

	public function destroy()
	{
		auth()->logout();

		return redirect()->home();
	}

	public function store()
	{
		// Attempt to authenticate the user
		// If not - redirect back
		// Is so - sign them in & redirect to home page

		if (!auth()->attempt(request(['email', 'password']))) {
			return back()->withErrors([
				'message' => 'Please check your credentials and try again',
			]);
		}

		return redirect()->home();
	}
}
