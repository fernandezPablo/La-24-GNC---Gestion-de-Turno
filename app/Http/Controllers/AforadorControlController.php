<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\AforadorControl;

class AforadorControlController extends Controller
{
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

}
