<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantCertificateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_certificates', function (Blueprint $table) {

            $table->uuid('id');

            $table->string('title')->index();
            $table->string('institution')->index();
            $table->text('summary')->nullable();
            $table->date('started_at')->index()->nullable();
            $table->date('finished_at')->index()->nullable();
             $table->date('expired_at')->index()->nullable();
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
            $table->uuid('project_id')->nullable();
            $table->foreign('project_id')->references('id')
                ->on('projects')
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
        Schema::dropIfExists('applicant_certificates');
    }
}
