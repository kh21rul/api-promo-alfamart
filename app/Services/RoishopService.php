<?php

namespace App\Services;

use App\Models\Roishop;

interface RoishopService
{
    public function all();
    public function store(array $data);
    public function update(Roishop $roishop, array $data);
    public function delete(Roishop $roishop);
}
