<?php

class Session_Controller extends Base_Controller
{

	public $restful = TRUE;

	public function get_register()
	{
		$this->view_data['title'] = 'Register';

		return View::make('session.register', $this->view_data);
	}

	public function post_register()
	{
		if (User::where_email(Input::get('email'))->first())
			return $this->post_login();

		$validation = User::validate(Input::all());

		if ($validation->passes())
		{
			User::create(array(
				'email' => Input::get('email'),
				'password' => Hash::make(Input::get('password')),
			));

			$user = User::where_email(Input::get('email'))->first();
			Auth::login($user);

			return Redirect::to_route('app.dashboard')
				->with('message', 'Welcome to the club, hope you enjoy the app')
				-with('message-type', 'success');
		}

		return Redirect::to_route('register')->with_errors($validation)->with_input();
	}

	public function get_login()
	{
		$this->view_data['title'] = 'Login';

		return View::make('session.login', $this->view_data);
	}

	public function post_login()
	{
		$user = array(
			'username' => Input::get('email'),
			'password' => Input::get('password'),
		);

		if (Auth::attempt($user))
		{
			return Redirect::to_route('app.dashboard')
				->with('message', "Thanks for coming back. It's great to see you again!");
		}
		else
		{
			return Redirect::to_route('session.login')
				->with('message', 'Your email / password combination was incorrect.')
				->with('message-type', 'error')
				->with_input();
		}
	}

	public function get_logout()
	{
		if (Auth::check())
		{
			Auth::logout();
			return Redirect::to_route('session.login')
				->with('message', 'You are now logged out.')
				->with('message-type', 'info');
		}
		else
		{
			return Redirect::to_route('home');
		}
	}
}