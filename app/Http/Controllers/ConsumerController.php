<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Services\ConsumerService;

class ConsumerController extends Controller
{
    private ConsumerService $consumerService;

    public function __construct(ConsumerService $consumerService)
    {
        $this->consumerService = $consumerService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_consumer = $this->consumerService->all();

        return response()->json([
            'message' => 'Successfully retrieved all data consumer',
            'data' => $data_consumer
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string',
            'email' => 'nullable|email',
            'usia' => 'nullable|numeric',
            'jenis_kelamin' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'pendapatan_perbulan' => 'nullable|string',
            'lokasi_cabang' => 'required|string',
            'jenis_promo' => 'required|string',
            'jumlah_produk' => 'required|numeric',
            'alasan' => 'required|string',
            'tingkat_kepuasan' => 'required|numeric'
        ]);

        $result = $this->consumerService->store($validatedData);

        return response()->json([
            'message' => 'Data consumer created successfully',
            'data' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumer $consumer)
    {
        return response()->json([
            'message' => 'Data roi retrieved successfully',
            'data' => $consumer,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumer $consumer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumer $consumer)
    {
        $this->consumerService->delete($consumer);

        return response()->json([
            'message' => 'Data consumer deleted successfully',
        ], 200);
    }

    public function analysis()
    {
        $data_analysis = $this->consumerService->analysis();

        return response()->json([
            'message' => 'Calculated Analysis Successfully',
            'data' => $data_analysis
        ], 200);
    }
}
