<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('title');
            $table->string('summary');
            $table->string('responsibilities');
            $table->string('requirements');
            $table->string('duration')->default('Full Time');
            $table->date('dueAt');
            $table->date('publishedAt');
            $table->integer('project_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->integer('sector_id')->unsigned();

            $table->foreign('project_id')->references('id')->on('projects')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();

            //indexes
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
