<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/popular-drinks', 'DrinkController@popularIndex')->name('popular.drinks.index');

Route::get('/drinks', 'DrinkController@index')->name('drinks.index');

Route::post('/orders', 'OrderController@store')->name('orders.store');
Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
Route::get('/orders', 'OrderController@index')->name('orders.index');
Route::post('/orders/{order}', 'OrderController@update')->name('orders.drinks.update');

Route::get('/ingredients', 'IngredientController@index')->name('ingredients.index');
Route::post('/ingredients', 'IngredientController@update')->name('ingredients.update');
