<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function aforadorControls(){
        return $this->hasMany('App\AforadorControl');
    }

    public function sale(){
        return $this->hasOne('App\Sale');
    }

}
