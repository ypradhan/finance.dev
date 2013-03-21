<?php

class Transaction extends Base_Model
{

	public static $rules = array(
		'description' => 'required',
		'amount' => 'required|numeric',
		'date' => 'required'
	);

	public function get_date()
	{
		return DateTime::createFromFormat('Y-m-d H:i:s', $this->get_attribute('date'))->format('d-M');
	}

	public function account()
	{
		return $this->belongs_to('Account');
	}

	public function category()
	{
		return $this->belongs_to('Category');
	}
}