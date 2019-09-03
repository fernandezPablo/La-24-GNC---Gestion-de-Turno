<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDeclaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_declares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->double('amount');
            $table->enum('type',['EFECTIVO','VALE','CUENTA_CORRIENTE']);
            $table->unsignedBigInteger('id_sale');
            $table->foreign('id_sale')->references('id')->on('sales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_declares');
    }
}
