<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationStageTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('application_stages', function (Blueprint $table) {

			$table->uuid('id');
			$table->decimal('score', 5, 2)->nullable()->index();
			$table->text('comment')->nullable();
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');

			//foreigns
			$table->uuid('application_id');
			$table->foreign('application_id')->references('id')
				->on('applications')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('stage_id');
			$table->foreign('stage_id')->references('id')
				->on('stages')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('applicant_id');
			$table->foreign('applicant_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('organization_id');
			$table->foreign('organization_id')->references('id')
				->on('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->uuid('position_id');
			$table->foreign('position_id')->references('id')
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
		Schema::dropIfExists('application_stages');
	}
}
