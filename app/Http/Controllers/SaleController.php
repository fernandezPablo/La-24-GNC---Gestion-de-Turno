<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Sale;
use La24GNC\Product;

define('$GNC_PRICE', Product::find(1));
define('$OIL_PRICE', Product::find(2));

class SaleController extends Controller
{

    public function newSale($turnId){
        $sale = new Sale;

        $sale->turn_id = $turnId;
        $sale->total_gnc = 0;
        $sale->total_gnc_wca = 0;
        $sale->total_gnc_with_discount = 0;
        $sale->total_various = 0;
        $sale->total_oil = 0;
        $sale->total_sales = 0;

        $sale->save();

        return $sale->id;

    }

    public function getSale($turnId){
        return Sale::where('turn_id',$turnId)->get();
    }

    public function setTotalGnc($saleId,$totalM3){
        $sale = Sale::find($saleId);
        $sale->total_gnc = $totalM3 * $GNC_PRICE;
        $sale->save();
    }
}
