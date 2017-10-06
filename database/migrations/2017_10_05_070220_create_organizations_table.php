<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('logo')->nullable();
            $table->uuid('sector_id')->nullable();
            $table->foreign('logo')->references('id')->on('medias')
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
        Schema::dropIfExists('organizations');
    }
}
