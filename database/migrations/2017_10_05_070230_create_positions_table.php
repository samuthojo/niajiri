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
            $table->longText('summary');
            $table->longText('responsibilities');
            $table->longText('requirements');
            $table->string('duration')->default('Full Time');
            $table->date('dueAt');
            $table->date('publishedAt');
            $table->uuid('project_id')->nullable();
            $table->uuid('organization_id')->nullable();
            $table->uuid('sector_id')->nullable();

            $table->foreign('project_id')->references('id')->on('projects')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organization_id')->references('id')->on('organizations')
              ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sector_id')->references('id')->on('sectors')
              ->onUpdate('cascade')->onDelete('cascade');
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
    public function down()
    {
        Schema::dropIfExists('positions');
    }
}
