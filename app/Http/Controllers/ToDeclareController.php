<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\ToDeclare;

class ToDeclareController extends Controller
{
    public function getToDeclareElements($saleId){
        return ToDeclare::where('sale_id',$saleId)->get();
    }

    public function newToDeclareElement(Request $request){
        $toDeclareElement = new ToDeclare;

        $toDeclareElement->description = $request->description;
        $toDeclareElement->amount = $request->amount;
        $toDeclareElement->type = $request->type;
        $toDeclareElement->sale_id = $request->saleId;

        $toDeclareElement->save();

        return $toDeclareElement;
    }

    public function updateToDeclareElement(Request $request){
        $toDeclareElement = ToDeclare::find($request->id);

        $toDeclareElement->type = $request->type;
        $toDeclareElement->description = $request->description;
        $toDeclareElement->amount = $request->amount;

        $toDeclareElement->save();
    }

    public function deleteToDeclareElement(Request $request){
        $toDeclareElement = ToDeclare::find($request->id);
        $toDeclareElement->delete();
    }
}
