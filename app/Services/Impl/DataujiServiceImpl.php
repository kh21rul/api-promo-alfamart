<?php

namespace App\Services\Impl;

use App\Models\Dataset;
use App\Models\Datauji;
use App\Services\DatasetService;
use App\Services\DataujiService;

class DataujiServiceImpl implements DataujiService
{
    private DatasetService $datasetService;

    public function __construct(DatasetService $datasetService)
    {
        $this->datasetService = $datasetService;
    }

    public function all()
    {
        return Datauji::all();
    }

    public function store(array $data)
    {
        return $this->save(new Datauji(), $data);
    }

    public function update(Datauji $datauji, array $data)
    {
        return $this->save($datauji, $data);
    }

    public function delete(Datauji $datauji)
    {
        $datauji->delete();
    }

    private function save(Datauji $datauji, array $data)
    {
        // Check if the dataset is empty
        if (Dataset::count() === 0) {
            return response()->json([
                'message' => 'Tidak bisa membuat data uji, harap mengisi dataset'
            ], 400);
        }

        $nilai_b1 = $this->datasetService->nilaiB1();
        $nilai_b2 = $this->datasetService->nilaiB2();
        $nilai_b3 = $this->datasetService->nilaiB3();
        $nilai_b4 = $this->datasetService->nilaiB4();
        $nilai_b5 = $this->datasetService->nilaiB5();

        $nilai_y = $nilai_b1 + $nilai_b2 * $data['X1'] + $nilai_b3 * $data['X2'] + $nilai_b4 * $data['X3'] + $nilai_b5 * $data['X4'];

        $datauji->nama_toko = $data['nama_toko'];
        $datauji->X1 = $data['X1'];
        $datauji->X2 = $data['X2'];
        $datauji->X3 = $data['X3'];
        $datauji->X4 = $data['X4'];
        $datauji->Y = $nilai_y;

        $datauji->save();

        return $datauji;
    }
}
