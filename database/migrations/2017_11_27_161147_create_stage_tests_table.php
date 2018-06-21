<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStageTestsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('stage_tests', function (Blueprint $table) {

			$table->uuid('id');
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('applicant_id');
			$table->foreign('applicant_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('application_id');
			$table->foreign('application_id')->references('id')
				->on('applications')
				->onUpdate('cascade')
				->onDelete('cascade');

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

			$table->uuid('test_id');
			$table->foreign('test_id')->references('id')
				->on('tests')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('applicationstage_id');
			$table->foreign('applicationstage_id')->references('id')
				->on('application_stages')
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
		Schema::dropIfExists('stage_tests');
	}
}
