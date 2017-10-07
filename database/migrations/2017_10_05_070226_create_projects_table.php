<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
          $table->uuid('id');
          $table->string('name');
          $table->string('startedAt');
          $table->string('endedAt');
          $table->uuid('organization_id')->nullable();
          $table->foreign('organization_id')->references('id')->on('organizations')
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
        Schema::dropIfExists('projects');
    }
}
