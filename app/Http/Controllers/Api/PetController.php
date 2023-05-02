<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PetResource;
use App\Http\Requests\StoreUpdatePetRequest;
use App\Models\Pet;
use Illuminate\Http\Response;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PetResource::collection( Pet::paginate() );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePetRequest $request)
    {
        $pet = Pet::create($request->validated());
        return new PetResource($pet);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PetResource( Pet::findOrFail($id) );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePetRequest $request, string $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->validated());

        return new PetResource($pet);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pet = Pet::findOrFail($id)->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
