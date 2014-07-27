<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function ($table) {
			$table->increments('id');
			$table->string('name');
			$table->integer('order');
			$table->integer('category_id')->
				unsigned()->index();
			$table->integer('composition_id')->
				unsigned()->nullable()->default(null)->index();
			$table->integer('mark_id')->
				unsigned()->nullable()->default(null)->index();
			$table->timestamp('date_yellow')->nullable()->default(null);
			$table->timestamp('date_red')->nullable()->default(null);
			$table->text('comments')->nullable()->default(null);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cards');
	}

}
