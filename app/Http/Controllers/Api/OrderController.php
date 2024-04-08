<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($request): \Illuminate\Http\JsonResponse
    {
       $request->validate([
                'product_id' => 'required',
                'quantity' => 'required',
                'total' => 'required',
            ]);
            $Order = new Order();
            $Order->product_id = $request->input('product_id');
            $Order->quantity = $request->input('quantity');
            $Order->total = $request->input('total');
            $Order->save();
            return response()->json(['message' => 'Order created successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): void
    {
        Order::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Order $order
     * @param $id
     * @return mixed
     */
    public function show(Order $order, $id): mixed
    {
        return $Order = Order::find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @param $id
     */
    public function update(UpdateOrderRequest $request, Order $order, $id): void
    {
          $Order = Order::find($id);
          $Order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param Order $order
     * @param $id
     */
    public function destroy(Order $order, $id): void
    {
        $Order = Order::find($id);
        $Order->delete();
    }
}
