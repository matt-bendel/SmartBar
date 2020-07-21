<?php

use App\Drink;
use App\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/ingredients', function () {
    $ingredients = \App\Ingredient::all();
   return view('ingredients', ['ingredients'  => $ingredients]);
});

Route::get('/ingredients/{id}', function ($id) {
    $ingredient = DB::table('ingredients')->find($id);
    return view('ingredient_edit', ['ingredient' => $ingredient]);
});

Route::put('/ingredients/{id}', 'IngredientController@edit');

Route::get('/order/drinks/{page}', function () {
    $drinks = DB::table('drinks')->get();
    $ingredients = array();

    foreach ($drinks as $drink) {
        $drink_ing = DB::table('drink_ingredient')->where('drink_id', $drink->id)->get();
        $array = array();

        foreach ($drink_ing as $item) {
            $i = DB::table('ingredients')->find($item->ingredient_id);
            $i->num_servings = $item->amount;
            array_push($array, $i);
        }

        $ingredients[$drink->name] = $array;
    }

    $drinks = DB::table('drinks')->paginate(5);

    return view('order', ['drinks' => $drinks, 'ingredients' => $ingredients]);
});

Route::get('/drinks/add', function () {
    $ingredients = \App\Ingredient::all();
    return view('drink_add', ['ingredients' => $ingredients]);
});

Route::post('/drinks/add', 'DrinkController@store');

Route::get('/order/delete/{id}', 'DrinkController@delete');

Route::get('/order/create/{drink_id}', 'OrderController@store');

Route::get('/order/{id}', function ($id) {
   $order = \App\Order::all();

   return view('order_in_prog', ['order' => $order]);
});

Route::get('/orders/{id}/delete', 'OrderController@delete');
