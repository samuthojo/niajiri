<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
              $table->uuid('id');
              $table->string('label');
              $table->string('firstChoice');
              $table->string('secondChoice');
              $table->string('thirdChoice');
              $table->string('fourthChoice');
              $table->string('fifthChoice');
              $table->string('correct');
              $table->decimal('weight', 5, 2);
              $table->uuid('test_id')->nullable();
              $table->foreign('test_id')
                    ->references('id')
                    ->on('tests')
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
        Schema::dropIfExists('questions');
    }
}
