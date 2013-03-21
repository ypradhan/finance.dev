<?php

class User extends Base_Model
{
	/**
	 * A user model rules. How to validate each item
	 * 
	 * @var array
	 */
	public static $rules = array(
		'email' => 'required|email|unique:users',
		'password' => 'required|min:4',
	);


	public function name()
	{
		return "{$this->forename} {$this->surname}";
	}

	public function accounts()
	{
		return $this->has_many('Account');
	}
}