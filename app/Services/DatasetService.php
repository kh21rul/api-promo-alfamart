<?php

namespace App\Services;

interface DatasetService
{
    public function all();
    public function store(array $data);
    public function sums();
}
