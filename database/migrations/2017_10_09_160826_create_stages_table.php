<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
          $table->uuid('id');
          $table->string('name');
          $table->string('activities');
          $table->number('number')->default(1);
          $table->date('startedAt');
          $table->date('endedAt');
          $table->decimal('passMark', 5, 2);
          $table->uuid('position_id')->nullable();
          $table->foreign('position_id')
                ->references('id')
                ->on('positions')
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
        Schema::dropIfExists('stages');
    }
}
