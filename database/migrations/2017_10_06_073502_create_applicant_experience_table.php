<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_experiences', function (Blueprint $table) {

            $table->uuid('id');

            $table->string('organization')->index();
            $table->string('sector')->index();
            $table->string('position')->index();
            $table->text('summary');
            $table->string('location')->index();
            $table->date('started_at')->index()->nullable();
            $table->date('ended_at')->index()->nullable();
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
        Schema::dropIfExists('applicant_experiences');
    }
}
