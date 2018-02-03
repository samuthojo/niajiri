<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStageMessageColumns extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('stages', function (Blueprint $table) {
			$table->string('accepted')->nullable();
			$table->string('rejected')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::table('stages', function (Blueprint $table) {
			$table->dropColumn('accepted');
			$table->dropColumn('rejected');
		});
	}
}
