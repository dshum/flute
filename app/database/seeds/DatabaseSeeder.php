<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('ServiceSectionTableSeeder');

		$this->call('CategoryTableSeeder');

		$this->call('MarkTableSeeder');
	}

}
