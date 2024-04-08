<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return Store::all();
    }

    /**
     * Show the form for creating a new resource.
     * @param $request
     */
    public function create($request)
    {
        $request->validate([
            'name' => 'required',
            'theme' => 'required',
            'biography' => 'required',
        ]);
        $shop = new Store();
        $shop->name = $request->input('name');
        $shop->theme = $request->input('theme');
        $shop->biography = $request->input('biography');
        $shop->save();
        return response()->json(['message' => 'Shop created successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request): void
    {
        Store::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Store $store
     * @param $id
     * @return mixed
     */
    public function show(Store $store, $id): mixed
    {
        return $Store = Store::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, $id)
    {
        $store = Store::find($id);
        $store->update($request->all());
        return $store;
    }

    /**
     * Remove the specified resource from storage.
     * @param Store $store
     * @param $id
     */
    public function destroy(Store $store, $id): void
    {
        $store = Store::find($id);
        $store->delete();
    }
}
