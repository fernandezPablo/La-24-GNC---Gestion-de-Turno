<?php

namespace La24GNC\Http\Controllers;

use Illuminate\Http\Request;
use La24GNC\Product;
use Storage;
use File;

class ProductController extends Controller
{
   public function getProducts(){
        return Product::all();
   }

   public function getProduct($id){
      return Product::find($id);
   }

   public function storeImage($imageFile){
      $path = $imageFile->store('public'); 
      $explodePath = explode('/',$path);
      return 'storage/'.$explodePath[1];
   }

   public function newProduct(Request $request){
      $product = new Product;

      $product->description = $request->description;
      $product->price = $request->price;
      $product->discount = $request->discount;

      $imageFile = $request->file('image'); 
      $product->url_image = ProductController::storeImage($imageFile);
      
      $product->save();

      return json_encode($product);
   }

   public function deleteProduct(Request $request){
      $product = Product::find($request->id);

      $path = $request->url_image;

      $explodePath = explode('/',$path);

      $product->delete();
      Storage::disk('public')->delete($explodePath[1]);
   }

   public function updateProduct(Request $request){
      $product = Product::find($request->id);

      $product->description = $request->description;
      $product->price = $request->price;
      $product->discount = $request->discount;

      $imageFile = $request->file('image');
      $product->url_image = ProductController::storeImage($imageFile);

      $product->save();

      return json_encode($product);
   }

}
