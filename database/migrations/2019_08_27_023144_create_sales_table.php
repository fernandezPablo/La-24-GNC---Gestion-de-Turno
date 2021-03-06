<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('turn_id');
            $table->foreign('turn_id')->references('id')->on('turns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table){
            $table->dropForeign(['turn_id']);
            $table->dropColumn('turn_id');
        });
        Schema::table('turns', function (Blueprint $table){
            $table->dropForeign(['sales_id']);
            $table->dropColumn('sales_id');
        });
        Schema::dropIfExists('turns');
        Schema::dropIfExists('sales');
    }
}
