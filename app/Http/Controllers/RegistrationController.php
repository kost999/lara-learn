<?php

namespace App\Http\Controllers;

use App\Mail\Welcome;
use App\User;

class RegistrationController extends Controller
{
    public function create()
	{
		return view('registration.create');
	}

	public function store()
	{
		// validate form
		// create and save the user
		// sign them in
		// redirect to home page

		$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required|confirmed',
		]);

		$user = User::create(
			request(['name', 'email', 'password'])
		);

		auth()->login($user);

		\Mail::to($user)->send(new Welcome($user));

		return redirect()->home();
	}
}
