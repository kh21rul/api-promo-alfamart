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
}
