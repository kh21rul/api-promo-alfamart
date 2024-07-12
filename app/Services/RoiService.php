<?php

namespace App\Services;

use App\Models\Roi;

interface RoiService
{
    public function all();
    public function store(array $data);
    public function update(Roi $roi, array $data);
    public function delete(Roi $roi);
}
