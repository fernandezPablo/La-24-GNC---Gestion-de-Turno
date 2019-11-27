<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\AforadorControl;
use \stdClass;

class AforadorControlController extends Controller
{
    private $saleController;

    public function __construct(){
        $this->saleController = new SaleController;
    }

    public function newAforadorControl($turnId, $type, $aforadors, $pmzIn){
        $aforadorControl = new AforadorControl;
    
        $aforadorControl->total = 0;
        $aforadorControl->type = $type;
        $aforadorControl->turn_id = $turnId;
        $aforadorControl->pmz_in = $pmzIn;
        $aforadorControl->pmz_out = 0.0;
        $aforadorControl->pmz_difference = 0.0;
        $aforadorControl->total_m3 = 0.0;
        $aforadorControl->total_lts = 0.0;

        $aforadorControl->save();
        
        $this->generateAforador($aforadorControl->id, $type, $aforadors);
    }

    private function generateAforador($idAforadorControl,$type,$aforadors){
        $aforadorController = new AforadorController;
        
        $index = 1;
        if($type == "GNC"){
            foreach($aforadors as $aforador){
                $aforadorController->newAforador($index,$aforador,"GNC",$idAforadorControl);
                $index++;
            }
        }
        else{
            $aforadorController->newAforador($index,$aforadors[0],"OIL",$idAforadorControl);
        }
    }
    
    /**
     * return: 
     *  - m3
     *  - array aforadorsIn
     *  - array aforadorsOut
     *  - difference aforadors
     *  - pmz in
     *  - pmz out 
     *  - pmz difference
     */
    public function getResultTurnGnc(Request $request){
        $aforadorControls = AforadorControl::where('turn_id',$request->turnId)->get();
        $resultGnc = new stdClass;

        foreach($aforadorControls as $aforadorControl){
            if($aforadorControl->type == "GNC"){
                $resultGnc->m3 = $aforadorControl->total_m3;
                $resultGnc->pmzIn = $aforadorControl->pmz_in;
                $resultGnc->pmzOut = $aforadorControl->pmz_out;
                $resultGnc->pmzDifference = $aforadorControl->pmz_difference;
                foreach($aforadorControl->aforadors as $aforador){
                   $resultGnc->aforadorsIn[] = $aforador->valueIn;
                   $resultGnc->aforadorsOut[] = $aforador->valueOut;
                   $resultGnc->difference[] = $aforador->difference;
                }
            }
        }

        $resultGnc->saleResult = $this->saleController->getSale($request->turnId);
         
        return json_encode($resultGnc);
    }

}
