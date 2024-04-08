<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Models\User;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return User::all();
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
        $User = User::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        return $User = User::find($id);
    }


    /**
     * Update the specified resource in storage.
     * @param UpdateStoreRequest $request
     * @param Store $store
     * @param $id
     */
    public function update(UpdateStoreRequest $request, Store $store, $id)
    {
        $User = User::find($id);
        $User->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     * @param Store $store
     * @param $id
     */
    public function destroy(Store $store, $id)
    {
        $User = User::find($id);
        $User->delete();
    }
}
