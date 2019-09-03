<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAforadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aforadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->double('valueIn');
            $table->double('valueOut');
            $table->enum('type',['GNC_IN','GNC_OUT','GNC_TOTAL_IN','GNC_TOTAL_OUT','OIL_IN','OIL_OUT']);
            $table->unsignedBigInteger('id_turn');
            $table->foreign('id_turn')->references('id')->on('turns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aforador');
    }
}
