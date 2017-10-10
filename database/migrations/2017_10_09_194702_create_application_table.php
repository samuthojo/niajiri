<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {

            $table->uuid('id');
            $table->timestamps();
            $table->softDeletes();

            //indexes
            $table->primary('id');


            //foreigns
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

            //post indexes
            //enforce unique applicant application per position
            $table->unique(['applicant_id', 'position_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
