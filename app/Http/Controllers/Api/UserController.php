<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
       return User::all();
    }

    /**
     * Show the form for creating a new resource.
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create($request)
    {
       $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
            ]);
            $User = new User();
            $User->name = $request->input('name');
            $User->email = $request->input('email');
            $User->password = $request->input('password');
            $User->save();
            return response()->json(['message' => 'User created successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStoreRequest $request): void
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
        return $User;
    }

    /**
     * Remove the specified resource from storage.
     * @param Store $store
     * @param $id
     */
    public function destroy(Store $store, $id): void
    {
        $User = User::find($id);
        $User->delete();
    }
}
