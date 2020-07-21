<?php

namespace App\Http\Controllers;

use App\Drink;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DrinkController extends Controller
{
    public function store(Request $request)
    {
        $ingredients = $this->sortPost($request);
        Log::alert($ingredients);
        $drinks = Drink::create([
            'name' => $request->name,
            'image' => url('/images/drinks/baco.jpg'),
            'price' => 00.00
        ]);
        $drinks->ingredients()->sync($ingredients);
        $drinks->save();

        return redirect(url('/order/drinks/1'));
    }

    public function index()
    {
        return Drink::all();
    }

    public function popularIndex()
    {
        return Drink::limit(4)->get();
    }

    public function delete($id)
    {
        $drink = Drink::find($id);
        $drink->delete();

        return redirect(url('/order/drinks/1'));
    }

    private function sortPost($request)
    {
        $liquor1 = (int)$request->liquor1;
        $liquor2 = (int)$request->liquor2;
        $liquor3 = (int)$request->liquor3;

        $mixer1 = (int)$request->mixer1;
        $mixer2 = (int)$request->mixer2;
        $mixer3 = (int)$request->mixer3;
        $mixer4 = (int)$request->mixer4;
        $mixer5 = (int)$request->mixer5;

        $ingredients = array();

        if ($liquor1 != 0) {
            $ingredients[$liquor1] = array('amount' => (int)$request->liq1_amount);
        }

        if ($liquor2 != 0) {
            $ingredients[$liquor2] = array('amount' => (int)$request->liq2_amount);
        }

        if ($liquor3 != 0) {
            $ingredients[$liquor3] = array('amount' => (int)$request->liq3_amount);
        }

        if ($mixer1 != 0) {
            $ingredients[$mixer1] = array('amount' => (int)$request->mix1_amount);
        }

        if ($mixer2 != 0) {
            $ingredients[$mixer2] = array('amount' => (int)$request->mix2_amount);
        }

        if ($mixer3 != 0) {
            $ingredients[$mixer3] = array('amount' => (int)$request->mix3_amount);
        }

        if ($mixer4 != 0) {
            $ingredients[$mixer4] = array('amount' => (int)$request->mix4_amount);
        }

        if ($mixer5 != 0) {
            $ingredients[$mixer5] = array('amount' => (int)$request->mix5_amount);
        }


        return $ingredients;
    }
}
