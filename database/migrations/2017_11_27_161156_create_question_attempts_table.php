<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAttemptsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('question_attempts', function (Blueprint $table) {

			$table->uuid('id');
			$table->string('answer');
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('applicant_id')->nullable();
			$table->foreign('applicant_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('position_id')->nullable();
			$table->foreign('position_id')->references('id')
				->on('positions')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('stage_id')->nullable();
			$table->foreign('stage_id')->references('id')
				->on('stages')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('test_id')->nullable();
			$table->foreign('test_id')->references('id')
				->on('tests')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('question_id')->nullable();
			$table->foreign('question_id')->references('id')
				->on('questions')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('stagetest_id')->nullable();
			$table->foreign('stagetest_id')->references('id')
				->on('stage_tests')
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
		Schema::dropIfExists('question_attempts');
	}

}
