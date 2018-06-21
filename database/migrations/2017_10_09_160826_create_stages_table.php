<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('stages', function (Blueprint $table) {
			$table->uuid('id');
			$table->string('name');
			$table->string('activities')->nullable();
			$table->integer('number')->default(1);
			$table->date('startedAt');
			$table->date('endedAt');
			$table->boolean('hasTest');
			$table->decimal('passMark', 5, 2)->nullable();
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('position_id');
			$table->foreign('position_id')
				->references('id')
				->on('positions')
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
		Schema::dropIfExists('stages');
	}
}
