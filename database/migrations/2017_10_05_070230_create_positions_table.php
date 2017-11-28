<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('positions', function (Blueprint $table) {
			$table->uuid('id');
			$table->string('title');
			$table->longText('summary')->nullable();
			$table->longText('responsibilities')->nullable();
			$table->longText('requirements');
			$table->string('duration')->default('Full Time');
      $table->string('sector')->nullable();
			$table->date('dueAt');
			$table->date('publishedAt')->nullable();
			$table->uuid('project_id')->nullable();
			$table->uuid('organization_id')->nullable();

			$table->foreign('project_id')->references('id')->on('projects')
				->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('organization_id')->references('id')->on('users')
				->onUpdate('cascade')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();

			//indexes
			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('positions');
	}
}
