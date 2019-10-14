<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class ToDeclare extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'description',
        'amount',
        'type',
        'sale_id'
    ];

    public function sale(){
        return $this->belongsTo('App\Sale');
    }

}
