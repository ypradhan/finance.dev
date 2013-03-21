<?php

class Category extends Base_Model
{

	public function transactions()
	{
		return $this->has_many('Transaction');
	}
}