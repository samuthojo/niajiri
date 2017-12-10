<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('tests', function (Blueprint $table) {
			$table->uuid('id');
			$table->decimal('duration', 5, 2);
			$table->string('category');
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('position_id');
			$table->foreign('position_id')->references('id')
				->on('positions')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('stage_id');
			$table->foreign('stage_id')->references('id')
				->on('stages')
				->onUpdate('cascade')
				->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('tests');
	}
}
