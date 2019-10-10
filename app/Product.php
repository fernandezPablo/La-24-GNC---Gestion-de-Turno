<?php

namespace La24GNC;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'description',
        'price',
        'discount'
    ];

    public function saleLine(){
        return $this->belongsTo('App\SaleLine');
    }
}
