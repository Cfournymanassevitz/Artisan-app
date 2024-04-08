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
    public function index()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        Order::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Order $order
     * @param $id
     * @return mixed
     */
    public function show(Order $order, $id)
    {
        return $Order = Order::find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param UpdateOrderRequest $request
     * @param Order $order
     * @param $id
     */
    public function update(UpdateOrderRequest $request, Order $order, $id)
    {
          $Order = Order::find($id);
          $Order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param Order $order
     * @param $id
     */
    public function destroy(Order $order, $id)
    {
        $Order = Order::find($id);
        $Order->delete();
    }
}
