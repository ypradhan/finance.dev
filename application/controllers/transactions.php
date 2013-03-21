<?php

class Transactions_Controller extends Base_Controller
{

	public $restful = TRUE;

	/**
	 * @todo Check they own the account (and it exists)
	 * @param  [type] $account_id [description]
	 * @return [type]                  [description]
	 */
	public function get_create($account_id)
	{
		$account = Account::find($account_id);

		$data = array(
			'title' => 'Add a new transaction',
			'account' => $account,
			'accounts' => Account::user_accounts(),
		);

		return View::make('transactions.create', $data);
	}


	/**
	 * @todo Check they own the account (and it exists)
	 * @param  [type] $account_id [description]
	 * @return [type]                  [description]
	 */
	public function post_create($account_id)
	{
		$validation = Transaction::validate(Input::all());

		if ($validation->passes())
		{
			$transaction = Transaction::create(array(
				'date' => Input::get('date'),
				'description' => Input::get('description'),
				'amount' => Input::get('amount'),
				'account_id' => $account_id,
			));

			return Redirect::to_route('transactions.create', $account_id)
					->with('message', '<strong>Transaction</strong> was <strong>created</strong> successfully.');
		}

		return Redirect::to_route('transactions.create', $account_id)->with_errors($validation)->with_input();
	}

}