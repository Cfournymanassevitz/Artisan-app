<?php

namespace App\Http\Controllers;

use App\Models\order_Product;
use App\Http\Requests\Storeorder_ProductRequest;
use App\Http\Requests\Updateorder_ProductRequest;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Storeorder_ProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(order_Product $order_Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(order_Product $order_Product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateorder_ProductRequest $request, order_Product $order_Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order_Product $order_Product)
    {
        //
    }
}
