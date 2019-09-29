<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Turn;

class TurnController extends Controller
{

    private function getCurrentDate(){
        date_default_timezone_set('America/Argentina/Tucuman');
        $date = date("Y-m-d H:i:s");

        return $date;
    }

    private function getTurnNumber(){
        
        $hours = getdate()['hours'];
        
        if($hours >= 6 && $hours < 14){
            return 2;
        }
        else{
            if($hours >= 14 && $hours<22){
                return 3;
            }
            else{
                return 1;
            }
        }
        return 0;
    }

    public function newTurn(Request $request){
        
        $turn = new Turn;
        $saleController = new SaleController;
        $aforadorControlController = new AforadorControlController;

        $turn->date = $this->getCurrentDate();
        $turn->number = $this->getTurnNumber();
        $turn->user_id = $request->user_id;
        $turn->state = "OPEN";

        $turn->save();
        
        $turn->sales_id = $saleController->newSale($turn->id);
        $turn->save();

        //AFORADOR CONTROL GNC
        $aforadorControlController->newAforadorControl($turn->id,"GNC",$request->aforadorsGnc,$request->pmz);

        //AFORADOR CONTROL OIL
        $aforadorControlController->newAforadorControl($turn->id,"OIL",$request->aforadorOil,0);

        return $turn->id;

    }

    public function getAforadorsFromTheLastOpenTurn($turnId){
        $turn = Turn::find($turnId);

        $aforadorsValues = [];

        foreach($turn->aforadorControls as $aforadorControl){
            foreach($aforadorControl->aforadors as $aforador){
                array_push($aforadorsValues, $aforador->valueIn);
            }
            if($aforadorControl->type == "GNC"){
                array_push($aforadorsValues,$aforadorControl->pmz_in);    
            }
        }
        return json_encode($aforadorsValues);
    }

}
