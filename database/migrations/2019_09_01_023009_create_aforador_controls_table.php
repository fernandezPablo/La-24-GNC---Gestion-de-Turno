<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAforadorControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aforador_controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('total');
            $table->enum('type',['GNC','OIL']);
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
        Schema::dropIfExists('aforador_controls');
    }
}
