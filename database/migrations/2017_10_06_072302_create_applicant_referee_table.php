<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantRefereeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_referees', function (Blueprint $table) {

            $table->uuid('id');

            $table->string('name')->index();
            $table->string('title')->index();
            $table->string('organization')->index();
            $table->string('email')->index();
            $table->string('mobile')->index();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_referees');
    }
}
