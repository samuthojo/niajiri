<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('questions', function (Blueprint $table) {

			$table->uuid('id');
			$table->text('label');
			$table->string('firstChoice')->nullable();
			$table->string('secondChoice')->nullable();
			$table->string('thirdChoice')->nullable();
			$table->string('fourthChoice')->nullable();
			$table->string('fifthChoice')->nullable();
			$table->string('correct')->nullable();
			$table->decimal('weight', 15, 2)->default(1);
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('test_id');
			$table->foreign('test_id')
				->references('id')
				->on('tests')
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
		Schema::dropIfExists('questions');
	}
}
