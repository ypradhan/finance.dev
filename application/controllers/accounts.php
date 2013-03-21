<?php

class Accounts_Controller extends Base_Controller
{
	public $restful = TRUE;

	public function get_index()
	{
		if (Request::ajax())
		{
			$accounts = Auth::user()->accounts()->get();
			return Response::eloquent($accounts);
		}

		return 'Need to return a view';
	}

	/**
	 * Return a form view to create an account
	 *
	 * @return View
	 */
	public function get_create()
	{
		$this->view_data['title'] = 'Add an Account';

		return View::make('accounts.create', $this->view_data);
	}

	/**
	 * Handle the creation of an account, validates and shizzle.
	 *
	 * @return Redirect
	 */
	public function post_create()
	{
		$validation = Account::validate(Input::all());

		if ($validation->passes())
		{
			Account::create(array(
				'name' => Input::get('name'),
				'user_id' => Auth::user()->id,
			));

			return Redirect::to_route('app.dashboard')
				->with('message', 'Account added.');
		}

		return Redirect::to_route('accounts.create')
			->with_errors($validation)
			->with_input();
	}

	/**
	 * Show a single bank's transactions
	 *
	 * @todo Validate if this bank's transactions can be viewed by the user
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function get_show($id)
	{
		$account = Account::with(array('recent_transactions', 'recent_transactions.category'))->find($id);
		
		$this->view_data['title']		= "Viewing {$account->name} Transactions";
		$this->view_data['account']		= $account;
		$this->view_data['accounts'] 	= Auth::user()->accounts()->get();

		return View::make('accounts.show', $this->view_data);
	}

	public function get_recent_transactions($id)
	{
		$transactions = Transaction::recent($id);

		return Response::eloquent($transactions);
	}


}