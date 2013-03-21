<?php

class Create_Accounts_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('accounts', function($table){
			$table->increments('id');
			$table->string('name');
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('accounts');
	}

}