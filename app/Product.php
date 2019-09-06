<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function saleLine(){
        return $this->belongsTo('App\SaleLine')
    }
}
