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