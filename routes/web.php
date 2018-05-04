<?php

// App::bind('App\Billing\Stripe', function(){
// 	return new \App\Billing\Stripe(config('services.stripe.secret'));
// });

// $stripe = resolve('App\Billing\Stripe');

// dd($stripe);


Route::get('/kost', function(){
	dd('kost');
});

Route::get('/kost{kostId}', function($kostId){
	dd($kostId);
});



Route::get('/', 'PostsController@index')->name('home');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/home', function(){
	return redirect()->home();
});

Route::post('/posts/{post}/comments', 'CommentsController@store');

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/mailable', function () {
	return new \App\Mail\WelcomeAgain();
});
