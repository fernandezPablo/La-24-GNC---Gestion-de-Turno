<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Aforador extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'number',
        'valueIn',
        'valueOut',
        'type',
        'id_product',
        'difference',
        'id_aforador_control'
    ];

    public function aforadorControl(){
        return $this->belongsTo('La24GNC\AforadorControl');
    }
}
