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
    public function index()
    {
        return Store::all();
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
    public function store(StoreStoreRequest $request)
    {
        Store::create($request->all());
    }

    /**
     * Display the specified resource.
     * @param Store $store
     * @param $id
     * @return mixed
     */
    public function show(Store $store, $id)
    {
        return $Store = Store::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     * @param Store $store
     * @param $id
     */
    public function destroy(Store $store, $id)
    {
        $store = Store::find($id);
        $store->delete();
    }
}
