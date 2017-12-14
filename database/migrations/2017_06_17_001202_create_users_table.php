<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			//columns
			$table->uuid('id');
			$table->string('type')->default(User::TYPE_NORMAL)
				->index()
				->nullable();
			$table->string('name')->index()->nullable();
			$table->string('first_name')->index()->nullable();
			$table->string('middle_name')->index()->nullable();
			$table->string('surname')->index()->nullable();
			$table->string('contact_person')->index()->nullable();
			$table->string('email')->index()->unique();
			$table->string('sector')->index()->nullable();
			$table->string('secondary_email')->index()->nullable();
			$table->string('website')->index()->nullable();
			$table->string('mobile')->index()->unique();
			$table->string('alternative_mobile')->index()->nullable();
			$table->string('landline')->index()->nullable();
			$table->string('fax')->index()->nullable();
			$table->string('physical_address')->index()->nullable();
			$table->string('postal_address')->index()->nullable();
			$table->text('summary')->nullable();
			$table->string('password')->nullable();
		    $table->string('slug')->nullable();
			$table->string('avatar')->nullable(); //placeholder for direct avatar url
			
			//user verification logics
			$table->boolean('verified')->default(false);
            $table->string('verification_token')->nullable();

			$table->rememberToken();

			//applicant specific
			$table->string('gender')->index()->nullable();
			$table->date('dob')->index()->nullable();
			$table->string('marital_status')->index()->nullable();
			$table->text('skills')->nullable();
			$table->text('interests')->nullable();
			$table->text('hobbies')->nullable();
			$table->text('extracurricular_activities')->nullable();

			//location specific
			$table->string('country')->index()->nullable();
			$table->string('state')->index()->nullable();

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
		Schema::dropIfExists('users');
	}
}
