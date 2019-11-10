<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class AforadorControl extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'total',
        'type','
        id_turn',
        'pmz_in',
        'pmz_out',
        'pmz_difference',
        'total_m3',
        'total_lts'
    ];

    public function turn(){
        return $this->belongsTo('La24GNC\Turn');
    }

    public function aforadors(){
        return $this->hasMany('La24GNC\Aforador');
    }
}
