<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/open_turns/{userId}','MainController@findOpenTurn');

Route::post('/open_turn','TurnController@newTurn');

Route::get('/aforadors_values/{turnId}','TurnController@getAforadorsFromTheLastOpenTurn');

Route::post('/edit_open_turn','TurnController@editTurn');

Route::get('/products','ProductController@getProducts');

Route::get('/find_sale/{turnId}','SaleController@getSale');

Route::post('/new_sale_line','SaleLineController@newSaleLine');

Route::post('/increment_sale_line','SaleLineController@changeAmountSaleLine');

Route::get('/get_sale_lines/{saleId}','SaleLineController@getAllLineSaleFor');

Route::get('/get_to_declare_elements/{saleId}','ToDeclareController@getToDeclareElements');

Route::post('/new_element_to_declare','ToDeclareController@newToDeclareElement');

Route::post('/update_element_to_declare','ToDeclareController@updateToDeclareElement');

Route::delete('/delete_element_to_declare','ToDeclareController@deleteToDeclareElement');

Route::post('/close_turn','TurnController@CloseTurn');

Route::get('/to_declare/total/{saleId}','ToDeclareController@getTotalCurrentAccount');

Route::get('get_result_gnc/{turnId}','AforadorControlController@getResultTurnGnc');

Route::get('/get_result_closed_turn/{turnId}','TurnController@getResultClosedTurn');

Route::post('/new_product/','ProductController@newProduct');

Route::get('/public_path/','ProductController@getImageFromStore');