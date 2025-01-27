<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FavoritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favorites = Favorites::all();
        return response()->json([
            'status' => true,
            'message' => 'Data berhasil ditemukan',
            'data' => $favorites
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cartIcon'=>'required',
            'details'=>'required',
            'image'=>'required',
            'isFavorite'=>'required',
            'lastUpdated'=>'required',
            'name'=>'required',
            'price'=>'required',
            'purchaseCount'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'error' => $validator->errors()
            ], 422);
        }

        $favorites = Favorites::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'data berhasil dimasukkan',
            'data' => $favorites
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $favorites = Favorites::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'data berhasil ditemukan',
            'data' => $favorites
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'cartIcon'=>'required',
            'details'=>'required',
            'image'=>'required',
            'isFavorite'=>'required',
            'lastUpdated'=>'required',
            'name'=>'required',
            'price'=>'required',
            'purchaseCount'=>'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validasi error',
                'error' => $validator->errors()
            ], 422);
        }

        $favorites = Favorites::findOrFail($id);
        $favorites->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'data berhasil diperbaiki',
            'data' => $favorites
        ], 200);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $favorites = Favorites::findOrFail($id);
        $favorites->delete();
        return response()->json([
            'status' => true,
            'message' => 'data berhasil dihapus',
            'data' => $favorites
        ], 204);
    }
}
