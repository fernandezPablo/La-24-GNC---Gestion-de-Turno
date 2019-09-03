<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDifferenceAndIdAforadorControlColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aforadors',function (Blueprint $table){
            $table->double('difference');
            $table->unsignedBigInteger('id_aforador_control');
            $table->foreign('id_aforador_control')->references('id')->on('aforador_controls');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
