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
    public function matrixA5();
    public function nilaiH();
    public function detA();
    public function detA1();
    public function detA2();
    public function detA3();
    public function detA4();
    public function detA5();
    public function nilaiB1();
    public function nilaiB2();
    public function nilaiB3();
    public function nilaiB4();
    public function nilaiB5();
    public function efektifPromo();
}
