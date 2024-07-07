<?php

namespace App\Services\Impl;

use App\Models\Dataset;
use App\Services\DatasetService;

class DatasetServiceImpl implements DatasetService
{
    public function all()
    {
        return Dataset::all();
    }

    public function store(array $data)
    {
        $X1Y = $data['X1'] * $data['Y'];
        $X2Y = $data['X2'] * $data['Y'];
        $X3Y = $data['X3'] * $data['Y'];

        $X1X2 = $data['X1'] * $data['X2'];
        $X1X3 = $data['X1'] * $data['X3'];
        $X2X3 = $data['X2'] * $data['X3'];

        $X1_square = $data['X1'] ** 2;
        $X2_square = $data['X2'] ** 2;
        $X3_square = $data['X3'] ** 2;

        $dataset = Dataset::create([
            'nama_toko' => $data['nama_toko'],
            'Y' => $data['Y'],
            'X1' => $data['X1'],
            'X2' => $data['X2'],
            'X3' => $data['X3'],
            'X1Y' => $X1Y,
            'X2Y' => $X2Y,
            'X3Y' => $X3Y,
            'X1X2' => $X1X2,
            'X1X3' => $X1X3,
            'X2X3' => $X2X3,
            'X1_square' => $X1_square,
            'X2_square' => $X2_square,
            'X3_square' => $X3_square,
        ]);

        return $dataset;
    }

    public function sums()
    {
        return Dataset::selectRaw('
            SUM(Y) as sum_Y,
            SUM(X1) as sum_X1,
            SUM(X2) as sum_X2,
            SUM(X3) as sum_X3,
            SUM(X1Y) as sum_X1Y,
            SUM(X2Y) as sum_X2Y,
            SUM(X3Y) as sum_X3Y,
            SUM(X1X2) as sum_X1X2,
            SUM(X1X3) as sum_X1X3,
            SUM(X2X3) as sum_X2X3,
            SUM(X1_square) as sum_X1_square,
            SUM(X2_square) as sum_X2_square,
            SUM(X3_square) as sum_X3_square
        ')->first();
    }
}
