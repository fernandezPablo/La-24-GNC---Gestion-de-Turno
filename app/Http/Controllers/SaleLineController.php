<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Sale;
use La24GNC\SaleLine;

class SaleLineController extends Controller
{
    public function newSaleLine(Request $request){
        
        $saleLine = new SaleLine;
        
        $saleLine->amount = $request->amount;
        $saleLine->sale_id = $request->sale_id;
        $saleLine->product_id = $request->product_id;
        $saleLine->total = $request->total;

        $saleLine->save();

        return $saleLine;
    }

    public function changeAmountSaleLine(Request $request){
        $saleLine = SaleLine::find($request->id);

        $saleLine->amount = $request->amount;
        $saleLine->total = $request->total;

        $saleLine->save();
    }

    public function getAllLineSaleFor($saleId){
        return SaleLine::where('sale_id',$saleId)->get();
    }
}
