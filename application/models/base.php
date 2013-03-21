<?php

class Base_Model extends Eloquent
{
	/**
	 * The rules array stores Validator rules in an array indexed by
	 * the field_name to which the rules should be applied.
	 *
	 * @var array
	 */
	public static $rules = array();

	/**
	 * The messages array stores Validator messages in an array indexed by
	 * the field_name to which the messages should be applied in case of errors.
	 *
	 * @var array
	 */
	public static $messages = array();

	/**
	 * Validates model.
	 *
	 * @param  array   $input
	 * @return bool
	 */
	public static function validate($data)
	{
		return Validator::make($data, static::$rules, static::$messages);
	}
}