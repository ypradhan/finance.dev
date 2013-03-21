<?php

class Create_Transactions_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function($table) {
			$table->increments('id');
			$table->date('date');
			$table->string('description');
			$table->decimal('amount', 19, 2);
			$table->integer('account_id')->unsigned();
			$table->integer('category_id')->unsigned()->nullable();
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
		Schema::drop('transactions');
	}

}