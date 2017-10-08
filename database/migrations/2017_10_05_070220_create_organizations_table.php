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
            $table->string('name')->index()->nullable();
            $table->string('email')->index()->unique();
            $table->string('mobile')->index()->unique();
            $table->string('landline')->index()->nullable();
            $table->string('fax')->index()->nullable();
            $table->string('website')->index()->nullable();
            $table->string('physical_address')->index()->nullable();
            $table->string('postal_address')->index()->nullable();
            $table->uuid('logo')->nullable();
            $table->uuid('sector_id')->nullable();
            $table->foreign('logo')->references('id')->on('medias')
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
        Schema::dropIfExists('organizations');
    }
}
