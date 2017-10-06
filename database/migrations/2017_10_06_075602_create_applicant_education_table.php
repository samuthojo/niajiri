<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_educations', function (Blueprint $table) {

            $table->uuid('id');

            $table->string('level')->index();
            $table->string('institution')->index();
            $table->text('summary')->nullable();
            $table->date('started_at')->index()->nullable();
            $table->date('finished_at')->index()->nullable();
            $table->string('remark')->index();
            $table->timestamps();
            $table->softDeletes();

            //indexes
            $table->primary('id');

            //foreigns
            $table->uuid('applicant_id')->nullable();
            $table->foreign('applicant_id')->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicant_educations');
    }
}
