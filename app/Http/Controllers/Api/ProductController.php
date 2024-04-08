<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }
    public function create($request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->save();
        return response()->json(['message' => 'Product created successfully'], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $Product = Product::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Product = Product::find($id);
        $Product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Product = Product::find($id);
        $Product->delete();
    }
}
