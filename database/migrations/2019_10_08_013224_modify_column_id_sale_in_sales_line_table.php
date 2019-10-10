<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyColumnIdSaleInSalesLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales_lines', function (Blueprint $table) {
            $table->renameColumn('id_sale','sale_id');
            $table->renameColumn('id_product','product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales_line', function (Blueprint $table) {
            //
        });
    }
}
