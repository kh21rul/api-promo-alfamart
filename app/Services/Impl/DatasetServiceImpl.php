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
        return $this->save(new Dataset(), $data);
    }

    public function update(Dataset $dataset, array $data)
    {
        return $this->save($dataset, $data);
    }

    public function delete(Dataset $dataset)
    {
        $dataset->delete();
    }

    private function save(Dataset $dataset, array $data)
    {
        $dataset->nama_toko = $data['nama_toko'];
        $dataset->Y = $data['Y'];
        $dataset->X1 = $data['X1'];
        $dataset->X2 = $data['X2'];
        $dataset->X3 = $data['X3'];

        $dataset->X1Y = $dataset->X1 * $dataset->Y;
        $dataset->X2Y = $dataset->X2 * $dataset->Y;
        $dataset->X3Y = $dataset->X3 * $dataset->Y;

        $dataset->X1X2 = $dataset->X1 * $dataset->X2;
        $dataset->X1X3 = $dataset->X1 * $dataset->X3;
        $dataset->X2X3 = $dataset->X2 * $dataset->X3;

        $dataset->X1_square = pow($dataset->X1, 2);
        $dataset->X2_square = pow($dataset->X2, 2);
        $dataset->X3_square = pow($dataset->X3, 2);

        $dataset->save();

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
