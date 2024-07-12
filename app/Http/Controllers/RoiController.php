<?php

namespace App\Http\Controllers;

use App\Models\Roi;
use App\Services\RoiService;
use Illuminate\Http\Request;

class RoiController extends Controller
{
    private RoiService $roiService;

    public function __construct(RoiService $roiService)
    {
        $this->roiService = $roiService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_roi = $this->roiService->all();

        return response()->json([
            'message' => 'Successfully retrieved all data roi',
            'data' => $data_roi
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|numeric',
            'laba_bersih' => 'required|numeric',
            'total_aktiva' => 'required|numeric',
            'standart_industri' => 'required|numeric',
        ]);

        $result = $this->roiService->store($validatedData);

        return response()->json([
            'message' => 'Data roi created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Roi $roi)
    {
        return response()->json([
            'message' => 'Data roi retrieved successfully',
            'data' => $roi,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Roi $roi)
    {
        $validatedData = $request->validate([
            'tahun' => 'required|numeric',
            'laba_bersih' => 'required|numeric',
            'total_aktiva' => 'required|numeric',
            'standart_industri' => 'required|numeric',
        ]);

        $result = $this->roiService->update($roi, $validatedData);

        return response()->json([
            'message' => 'Data roi updated successfully',
            'data' => $result,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roi $roi)
    {
        $this->roiService->delete($roi);

        return response()->json([
            'message' => 'Data roi deleted successfully',
        ], 200);
    }
}
