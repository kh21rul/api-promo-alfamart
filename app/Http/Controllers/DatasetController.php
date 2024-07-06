<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Services\DatasetService;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    private DatasetService $datasetService;

    public function __construct(DatasetService $datasetService)
    {
        $this->datasetService = $datasetService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datasets = $this->datasetService->all();

        return response()->json([
            'message' => 'Successfully retrieved all datasets',
            'data' => $datasets
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'Y' => 'required|numeric',
            'X1' => 'required|numeric',
            'X2' => 'required|numeric',
            'X3' => 'required|numeric',
        ]);

        $result = $this->datasetService->store($validatedData);

        return response()->json([
            'message' => 'Data created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Dataset $dataset)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dataset $dataset)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataset $dataset)
    {
        //
    }

    public function regression()
    {
        $sums = $this->datasetService->sums();

        return response()->json([
            'message' => 'Calculated sums successfully',
            'sums' => $sums
        ], 200);
    }
}
