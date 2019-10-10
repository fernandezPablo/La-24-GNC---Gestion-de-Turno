<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class SaleLine extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'amount',
        'sale_id',
        'product_id',
        'total'
    ];

    public function sale(){
        return $this->belongsTo('App\Sale');
    }

    public function products(){
        return $this->hasOne('App\Product');
    }
}
