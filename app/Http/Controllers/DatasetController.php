<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use Illuminate\Http\Request;
use App\Imports\DatasetsImport;
use App\Services\DatasetService;
use Maatwebsite\Excel\Facades\Excel;

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
        // return "test";
        $validatedData = $request->validate([
            'nama_toko' => 'required|string',
            'Y' => 'required|numeric',
            'X1' => 'required|numeric',
            'X2' => 'required|numeric',
            'X3' => 'required|numeric',
        ]);

        $result = $this->datasetService->update($dataset, $validatedData);

        return response()->json([
            'message' => 'Data updated successfully',
            'data' => $result,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dataset $dataset)
    {
        $this->datasetService->delete($dataset);

        return response()->json([
            'message' => 'Data deleted successfully',
        ], 200);
    }

    public function storefile(Request $request)
    {
        $request->validate([
            'dataset' => 'required|file|mimes:xlsx,xls',
        ]);

        try {
            $import = new DatasetsImport($this->datasetService);
            Excel::import($import, $request->file('dataset'));

            return response()->json([
                'message' => 'File imported successfully',
                'data' => $import->getImportedData(),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error importing file: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function regression()
    {
        $sums = $this->datasetService->sums();

        return response()->json([
            'message' => 'Calculated sums successfully',
            'sums' => $sums
        ], 200);
    }

    public function destroyAll()
    {
        try {
            Dataset::truncate();
            return response()->json([
                'message' => 'All datasets have been deleted successfully',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error deleting datasets: ' . $e->getMessage(),
            ], 500);
        }
    }
}
