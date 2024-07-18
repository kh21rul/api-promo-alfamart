<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoishopResource;
use App\Models\Roishop;
use Illuminate\Http\Request;
use App\Services\RoishopService;

class RoishopController extends Controller
{
    private RoishopService $roishopService;

    public function __construct(RoishopService $roishopService)
    {
        $this->roishopService = $roishopService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roishops = $this->roishopService->all();

        $result = RoishopResource::collection($roishops->loadMissing('shop:id,nama_toko'));

        return response()->json([
            'message' => 'Successfully retrieved all data roishop',
            'data' => $result
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shop_id' => 'required|numeric',
            'tahun' => 'required|numeric',
            'laba_bersih' => 'required|numeric',
            'total_aktiva' => 'required|numeric',
        ]);

        $roishop = $this->roishopService->store($validatedData);

        $result = new RoishopResource($roishop->loadMissing('shop:id,nama_toko'));

        return response()->json([
            'message' => 'Data roishop created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Roishop $roishop)
    {
        return response()->json([
            'message' => 'Data shop retrieved successfully',
            'data' => new RoishopResource($roishop->loadMissing('shop:id,nama_toko')),
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roishop $roishop)
    {
        $validatedData = $request->validate([
            'shop_id' => 'required|numeric',
            'tahun' => 'required|numeric',
            'laba_bersih' => 'required|numeric',
            'total_aktiva' => 'required|numeric',
        ]);

        $roishop = $this->roishopService->update($roishop, $validatedData);

        $result = new RoishopResource($roishop->loadMissing('shop:id,nama_toko'));

        return response()->json([
            'message' => 'Data roishop updated successfully',
            'data' => $result,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roishop $roishop)
    {
        $this->roishopService->delete($roishop);

        return response()->json([
            'message' => 'Data shop deleted successfully',
        ], 200);
    }
}
