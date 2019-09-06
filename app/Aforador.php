<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Aforador extends Model
{
    public function aforadorControl(){
        return $this->belongsTo('App\AforadorControl');
    }
}
