<?php

namespace App\Http\Controllers;

use App\Drink;
use App\Events\OrderUpdated;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderStatus;
use App\Ingredient;
use App\Order;
use http\Env\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        return $order->load(['user', 'drink']);
    }

    public  function index()
    {
        $orders = Order::where('status', Order::PENDING)->with(['drink.ingredients'])->get();
        $cancelCurrent = Cache::pull('cancel-order', false);

        return [
            'orders' => $orders,
            'cancel-current' => $cancelCurrent
        ];
    }

    public function store($drink_id)
    {
        $drink = Drink::with('ingredients')->findOrFail((int)$drink_id);

        // Check if ingredients are in stock
        if ($drink->inStock === false) {
            return response()->json(['message' => 'Out of stock'], Response::HTTP_BAD_REQUEST);
        }

        // Create order
        $order = Order::create([
            'drink_id' => $drink->id,
            'user_id'  => 1,
            'price'    => $drink->price,
            'status'   => Order::PENDING
        ]);

        // Update stock
        $drink->ingredients->map(function (Ingredient $ingredient) {
            $ingredient->update([
                'amount' => $ingredient->amount - $ingredient->pivot->amount
            ]);
        });

        $order->load(['user', 'drink']);

        return redirect(url('/order/' . $order->id));
    }

    public function update(UpdateOrderStatus $orderStatus, Order $order)
    {
        $status = $orderStatus->get('status');

        if ($status) {
            $order->update(['status' => $status]);
        }

        if ($status === Order::CANCELLED) {
            Cache::put('cancel-order', true);
        }

        event(new OrderUpdated($order, $orderStatus->get('message')));

        return $order;
    }

    function delete($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect(url('/'));
    }

    function delete_all()
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $order->delete();
        }

        return \response();
    }
}
