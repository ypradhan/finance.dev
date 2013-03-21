<?php

class Account extends Base_Model
{
	
	public static $rules = array(
		'name' => 'required',
	); 
	
	/**
	 * Relationship to the user model
	 * 
	 * @return
	 */
	public function user() {
		return $this->belongs_to('User');
	}

	/**
	 * Relationship to the transaction model
	 * 
	 * @return
	 */
	public function transactions()
	{
		return $this->has_many('Transaction');
	}

	public function recent_transactions()
	{
		return $this->has_many('Transaction')
				->order_by('date', 'desc')
				->take(10);
	}
}