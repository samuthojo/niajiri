<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantPublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_publications', function (Blueprint $table) {

            $table->uuid('id');

            $table->string('title')->index();
            $table->string('publisher')->index();
            $table->text('summary');
            $table->date('published_at')->index()->nullable();
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
        Schema::dropIfExists('applicant_publications');
    }
}
