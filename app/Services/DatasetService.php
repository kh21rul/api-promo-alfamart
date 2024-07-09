<?php

namespace App\Services;

use App\Models\Dataset;

interface DatasetService
{
    public function all();
    public function store(array $data);
    public function update(Dataset $dataset, array $data);
    public function delete(Dataset $dataset);
    public function sums();
    public function count();
    public function matrixA();
    public function matrixA1();
    public function matrixA2();
    public function matrixA3();
    public function matrixA4();
    public function nilaiH();
}
