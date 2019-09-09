<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\User;
use La24GNC\Turn;

class MainController extends Controller
{
    public function findOpenTurn($userId){
        
        $user = User::find($userId);
        $turns = $user->turns;
        $openTurns = [];

        foreach($turns as $turn){
            if($turn->state == "OPEN"){
                $openTurns[] = $turn;
            }
        }

        return $openTurns;  
    }

    public function indexUsers(){
        return User::all();
    }

}
