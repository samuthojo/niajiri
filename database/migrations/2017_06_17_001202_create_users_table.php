<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //columns
            $table->uuid('id');
            $table->string('name')->index()->nullable();
            $table->string('first_name')->index()->nullable();
            $table->string('middle_name')->index()->nullable();
            $table->string('surname')->index()->nullable();
            $table->string('email')->index()->unique();
            $table->string('mobile')->index()->unique();
            $table->string('landline')->index()->nullable();
            $table->string('fax')->index()->nullable();
            $table->string('physical_address')->index()->nullable();
            $table->string('postal_address')->index()->nullable();
            $table->string('gender')->index()->nullable();
            $table->date('dob')->index()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();

            //indexes
            $table->primary('id');

            //foreigns
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
