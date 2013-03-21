<?php

class App_Controller extends Base_Controller
{

	public $restful = TRUE;

	public function get_index()
	{
		$this->view_data['title'] = 'Homepage';

		if (Auth::check())
		{
			return Redirect::to_route('app.dashboard');
		}
		
		return View::make('app.home', $this->view_data);
	}

	public function get_dashboard()
	{
		
		Asset::add('js.app.dashboard', 'js/app/dashboard.js');

		$data = array(
			'title' => 'Dashboard',
			'accounts' => Auth::user()
							->accounts()
							->with(array('recent_transactions', 'recent_transactions.category'))
							->get(),
		);

		$data['json_accounts'] = eloquent_to_json($data['accounts']);

		return View::make('app.dashboard', $data);
	}

}