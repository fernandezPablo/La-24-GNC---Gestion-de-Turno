<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Aforador;

class AforadorController extends Controller
{
    public function newAforador($number, $valueIn, $type, $aforadorControlId){
        $aforador = new Aforador;
        $aforadorController = new AforadorController;
        $_GNC = 1;
        $_OIL = 2;

        $aforador->number = $number;
        $aforador->valueIn = $valueIn;
        $aforador->valueOut = 0.0;
        $aforador->type = $type;   
        if($type == "GNC"){
            $aforador->id_product = $_GNC;
        }
        else{
            $aforador->id_product = $_OIL;
        }
        $aforador->difference = 0.0;
        $aforador->aforador_control_id = $aforadorControlId;

        $aforador->save();
    }
}
