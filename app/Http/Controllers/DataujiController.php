<?php

namespace App\Http\Controllers;

use App\Models\Datauji;
use Illuminate\Http\Request;
use App\Services\DataujiService;

class DataujiController extends Controller
{
    private DataujiService $dataujiService;

    public function __construct(DataujiService $dataujiService)
    {
        $this->dataujiService = $dataujiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataujis = $this->dataujiService->all();

        return response()->json([
            'message' => 'Successfully retrieved all data uji',
            'data' => $dataujis
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'X1' => 'required|numeric',
            'X2' => 'required|numeric',
            'X3' => 'required|numeric',
        ]);

        $result = $this->dataujiService->store($validatedData);

        return response()->json([
            'message' => 'Data uji created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Datauji $datauji)
    {
        return response()->json([
            'message' => 'Data uji retrieved successfully',
            'data' => $datauji,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Datauji $datauji)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'X1' => 'required|numeric',
            'X2' => 'required|numeric',
            'X3' => 'required|numeric',
        ]);

        $result = $this->dataujiService->update($datauji, $validatedData);

        return response()->json([
            'message' => 'Data uji updated successfully',
            'data' => $result,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datauji $datauji)
    {
        $this->dataujiService->delete($datauji);

        return response()->json([
            'message' => 'Data uji deleted successfully',
        ], 200);
    }
}
