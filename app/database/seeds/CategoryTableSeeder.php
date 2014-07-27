<?php

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->truncate();

		Category::create(array(
			'name' => 'Наизусть',
			'order' => 1,
			'service_section_id' => 1,
		));

		Category::create(array(
			'name' => 'Ритм',
			'order' => 2,
			'service_section_id' => 1,
		));

		Category::create(array(
			'name' => 'Сложности',
			'order' => 3,
			'service_section_id' => 1,
		));

		Category::create(array(
			'name' => 'Динамика',
			'order' => 4,
			'service_section_id' => 1,
		));

	}

}
