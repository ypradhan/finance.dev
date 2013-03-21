<?php

class Add_Balance_To_Accounts {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounts', function($table) {
			$table->decimal('balance', 19, 2)->default(0.00);
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('accounts', function($table) {
			$table->drop_column('balance');
		});
	}

}