<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Route::get('/', array('as' => 'home', 'uses' => 'app@index'));

//
// Login & Register
//
Route::get('login', 		array('as' => 'session.login', 		'uses' => 'session@login'));
Route::get('register', 		array('as' => 'session.register', 	'uses' => 'session@register'));
Route::get('logout', 		array('as' => 'session.logout', 	'uses' => 'session@logout'));

Route::group(array('before' => 'csrf'), function() 
{
	Route::post('login', 		array('uses' => 'session@login'));
	Route::post('register', 	array('uses' => 'session@register'));
});

//
// Application
//
Route::group(array('before' => 'auth'), function()
{
	//
	// Dashboard
	//
	Route::get('dashboard', 				array('as' => 'app.dashboard', 'uses' => 'app@dashboard'));

	//
	// Accounts
	//
	Route::get('accounts',		 			array('as' => 'accounts.index', 	'uses' => 'accounts@index'));
	Route::get('accounts/create', 			array('as' => 'accounts.create', 	'uses' => 'accounts@create'));
	Route::get('accounts/(:num)', 			array('as' => 'accounts.show', 		'uses' => 'accounts@show'));
	Route::get('accounts/(:num)/edit', 		array('as' => 'accounts.edit', 		'uses' => 'accounts@edit'));

	//
	// Transactions
 	//
 	Route::get('accounts/(:num)/transactions/create', 		array('as' => 'transactions.create', 'uses' => 'transactions@create'));

});

//
// Protected & CRSF'ed
//
Route::group(array('before' => 'auth|csrf'), function()
{
	//
	// Accounts
	//
	Route::post('accounts/create', 			array('uses' => 'accounts@create'));
	Route::put('accounts/(:num)', 			array('uses' => 'accounts@update'));
	Route::delete('accounts/(:num)', 		array('uses' => 'accounts@destroy'));
 	
 	//
	// Transactions
 	//
 	Route::post('accounts/(:num)/transactions',		array('uses' => 'transactions@create'));
});


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});