<?php

class MarkTableSeeder extends Seeder {

	public function run()
	{
		DB::table('marks')->truncate();

		Mark::create(array(
			'name' => 'Желтый',
			'order' => 1,
			'service_section_id' => 2,
		));

		Mark::create(array(
			'name' => 'Красный',
			'order' => 2,
			'service_section_id' => 2,
		));

	}

}
