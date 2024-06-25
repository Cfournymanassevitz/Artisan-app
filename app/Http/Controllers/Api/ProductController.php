<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     @OA\Response(response="200", description="Get a list of products")
     * )
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Product::all();
    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     @OA\Response(response="201", description="Create a new product"),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                 example={"name": "Product Name", "description": "Product Description"}
     *             )
     *         )
     *     )
     * )
     */
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
     * @OA\Get(
     *     path="/api/products/{id}",
     *     @OA\Response(response="200", description="Get a specific product"),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     )
     * )
     */
    public function show(string $id)
    {
        return $Product = Product::find($id);
    }


    /**
     * @OA\Put(
     *     path="/api/products/{id}",
     *     @OA\Response(response="200", description="Update a specific product"),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string"
     *                 ),
     *                 example={"name": "Updated Product Name", "description": "Updated Product Description"}
     *             )
     *         )
     *     )
     * )
     */
    public function update(Request $request, string $id)
    {
        $Product = Product::find($id);
        $Product->update($request->all());
        return $Product;
    }


    /**
     * @OA\Delete(
     *     path="/api/products/{id}",
     *     @OA\Response(response="200", description="Delete a specific product"),
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     )
     * )
     */
    public function destroy(string $id)
    {
        $Product = Product::find($id);
        $Product->delete();
    }
}
