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
        $n = $this->datasetService->count();
        $matrixA = $this->datasetService->matrixA();
        $matrixA1 = $this->datasetService->matrixA1();
        $matrixA2 = $this->datasetService->matrixA2();
        $matrixA3 = $this->datasetService->matrixA3();
        $matrixA4 = $this->datasetService->matrixA4();
        $nilai_H = $this->datasetService->nilaiH();
        $determinan_A = $this->datasetService->detA();
        $determinan_A1 = $this->datasetService->detA1();
        $determinan_A2 = $this->datasetService->detA2();
        $determinan_A3 = $this->datasetService->detA3();
        $determinan_A4 = $this->datasetService->detA4();
        $nilai_b1 = $this->datasetService->nilaiB1();
        $nilai_b2 = $this->datasetService->nilaiB2();
        $nilai_b3 = $this->datasetService->nilaiB3();
        $nilai_b4 = $this->datasetService->nilaiB4();

        return response()->json([
            'message' => 'Calculated Regression Successfully',
            'sums' => $sums,
            'nilai_n' => $n,
            'matrixA' => $matrixA,
            'matrixA1' => $matrixA1,
            'matrixA2' => $matrixA2,
            'matrixA3' => $matrixA3,
            'matrixA4' => $matrixA4,
            'nilai_H' => $nilai_H,
            'determinan_A' => $determinan_A,
            'determinan_A1' => $determinan_A1,
            'determinan_A2' => $determinan_A2,
            'determinan_A3' => $determinan_A3,
            'determinan_A4' => $determinan_A4,
            'nilai_b1' => $nilai_b1,
            'nilai_b2' => $nilai_b2,
            'nilai_b3' => $nilai_b3,
            'nilai_b4' => $nilai_b4,
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
