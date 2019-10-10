<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Product;

class ProductController extends Controller
{
   public function getProducts(){
        return Product::all();
   }
}
