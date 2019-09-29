<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPmzColumnsToAforadorControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aforador_controls', function (Blueprint $table) {
            $table->double('pmz_in');
            $table->double('pmz_out');
            $table->double('pmz_difference');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aforador_controls', function (Blueprint $table) {
            //
        });
    }
}
