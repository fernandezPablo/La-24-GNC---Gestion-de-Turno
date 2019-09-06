<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class AforadorControl extends Model
{
    public function turn(){
        return $this->belongsTo('App\Turn');
    }

    public function aforadors(){
        return $this->hasMany('App\Aforador');
    }
}
