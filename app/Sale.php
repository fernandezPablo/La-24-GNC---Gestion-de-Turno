<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public $timestamps = false;

    protected $fillable = ['turn_id','total_gnc','total_gnc_wca','total_gnc_with_disccount','total_various','total_oil','total_sales'];

    public function turn(){
        return $this->belongsTo('La24GNC\Turn');
    }

    public function salelines(){
        return $this->hasMany('La24GNC\SaleLine');
    }

    public function toDeclares(){
        return $this->hasMany('La24GNC\ToDeclare');
    }
}
