<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function turn(){
        return $this->belongsTo('App\Turn');
    }

    public function salelines(){
        return $this->hasMany('App\SaleLine')
    }

    public function toDeclares(){
        return ->hasMany('to_decares');
    }
}
