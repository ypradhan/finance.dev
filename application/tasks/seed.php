<?php

class Seed_Task {

	public function run($arguments)
	{

		if (isset($arguments[0]) && $arguments[0] === 'all')
		{
			echo 'Seeding: Everything.' . "\r\n";
			$this->users();
			$this->accounts();
			$this->categories();
			$this->transactions();
		}
		else
		{
			echo 'Invalid command, available commands: seed: (all, users, accounts, transactions, categories)' . "\r\n";
		}
		
	}

	public function users()
	{
		echo 'Seeding: Users' . "\r\n";

		$this->user = User::create(array(
			'forename' => 'Cristian',
			'surname' => 'Giordano',
			'email' => 'cristian@sneekdigital.co.uk',
			'password' => Hash::make('password'),
		));

		User::create(array(
			'forename' => 'Gaz',
			'surname' => 'Thurlow',
			'email' => 'gaz@sneekdigital.co.uk',
			'password' => Hash::make('password'),
		));

		User::create(array(
			'forename' => 'Lucy',
			'surname' => 'Hutchinson',
			'email' => 'lucy@example.com',
			'password' => Hash::make('password'),
		));
	}

	public function accounts()
	{
		echo 'Seeding: Accounts' . "\r\n";
		$accounts = array(
			array('name' => 'HSBC - Main', 'balance' => -1243.65),
			array('name' => 'HSBC - Savings', 'balance' => 500.03),
		); 

		$this->user->accounts()->save($accounts);
	}

	public function categories()
	{
		echo 'Seeding: Categories'  . "\r\n";
		$categories = array(
			array('name' => 'Petrol'),
			array('name' => 'Entertainment'),
			array('name' => 'Clothes'),
			array('name' => 'Food'),
			array('name' => 'Water Bill'),
			array('name' => 'Electricity Bill'),
			array('name' => 'Oil Bill'),
			array('name' => 'Pet'),
			array('name' => 'Eating Out / Takeaway'),
			array('name' => 'Council Tax'),
			array('name' => 'Rent'),
			array('name' => 'Car Insurance'),
			array('name' => 'Car Tax'),
			array('name' => 'Phone Bill'),
			array('name' => 'Child Care'),
		);

		foreach ($categories as $category)
			Category::create($category);
	}

	public function transactions()
	{
		echo 'Seeding: Transactions' . "\r\n";
		$transactions = array();
		$generator = new Lorem();
		$date = new DateTime();

		// Payments out few in
		do {
			$date->setTimestamp( strtotime( mt_rand(0, 100) . ' days ago' ) );
			$transactions[] = array(
				'date' =>  $date->format( 'Y-m-d H:i:s' ),
				'description' => $generator->getContent(8, 'plain', false),
				'amount' => ( mt_rand(-100000, 10000) / 100 ),
				'account_id' => 1,
			);
			$i ++;
		} while($i < 60);

		// Payments in
		do {
			$date->setTimestamp( strtotime( mt_rand(0, 100) . ' days ago' ) );
			$transactions[] = array(
				'date' =>  $date->format( 'Y-m-d H:i:s' ),
				'description' => $generator->getContent(8, 'plain', false),
				'amount' => ( mt_rand(0, 400000) / 100 ),
				'account_id' => 1,
			);
			$i ++;
		} while($i < 10);

		Account::find(1)->transactions()->save($transactions);

	}
}