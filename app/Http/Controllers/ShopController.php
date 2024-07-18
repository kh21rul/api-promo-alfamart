<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Services\ShopService;
use App\Http\Resources\RoishopResource;

class ShopController extends Controller
{
    private ShopService $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->shopService->all();

        return response()->json([
            'message' => 'Successfully retrieved all data shop',
            'data' => $result
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'standart_industri' => 'required|numeric',
        ]);

        $result = $this->shopService->store($validatedData);

        return response()->json([
            'message' => 'Data shop created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        return response()->json([
            'message' => 'Data shop retrieved successfully',
            'data' => $shop,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'standart_industri' => 'required|numeric',
        ]);

        $result = $this->shopService->update($shop, $validatedData);

        return response()->json([
            'message' => 'Data shop updated successfully',
            'data' => $result,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $this->shopService->delete($shop);

        return response()->json([
            'message' => 'Data shop deleted successfully',
        ], 200);
    }

    public function getroishops(Shop $shop)
    {
        $roishops = $shop->roishops;

        $result = RoishopResource::collection($roishops->loadMissing('shop:id,nama_toko'));

        return response()->json([
            'message' => 'Data roishop ' . $shop->nama_toko . ' retrieved successfully',
            'data' => $result
        ], 200);
    }
}
