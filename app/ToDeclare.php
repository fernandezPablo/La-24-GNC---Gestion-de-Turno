<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class ToDeclare extends Model
{
    public function sale(){
        return $this->belongsTo('App\Sale')
    }

}
