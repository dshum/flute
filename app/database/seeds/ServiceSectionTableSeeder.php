<?php

class ServiceSectionTableSeeder extends Seeder {

	public function run()
	{
		DB::table('service_sections')->truncate();

		ServiceSection::create(array(
			'name' => 'Категории',
			'order' => 1,
		));

		ServiceSection::create(array(
			'name' => 'Оценки',
			'order' => 2,
		));

		ServiceSection::create(array(
			'name' => 'Произведения',
			'order' => 3,
		));

		ServiceSection::create(array(
			'name' => 'Архив произведений',
			'order' => 4,
		));

	}
	
}
