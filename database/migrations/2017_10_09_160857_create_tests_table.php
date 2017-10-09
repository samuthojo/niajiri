<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
          $table->uuid('id');
          $table->decimal('duration', 5, 2);
          $table->uuid('stage_id')->nullable();
          $table->uuid('test_category_id')->nullable();
          $table->foreign('stage_id')
                ->references('id')
                ->on('stages')
                ->onUpdate('cascade')
                ->onDelete('cascade');
          $table->foreign('test_category_id')
                ->references('id')
                ->on('test_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('tests');
    }
}
