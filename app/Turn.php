<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'date',
        'number',
        'user_id',
        'state'
    ];

    public function user(){
        return $this->belongsTo('La24GNC\User');
    }

    public function aforadorControls(){
        return $this->hasMany('La24GNC\AforadorControl');
    }

    public function sale(){
        return $this->hasOne('La24GNC\Sale');
    }

}
