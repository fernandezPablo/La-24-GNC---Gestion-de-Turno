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
        return $this->belongsTo('La24GNC\Sale');
    }

    public function product(){
        return $this->belongsTo('La24GNC\Product');
    }
}
