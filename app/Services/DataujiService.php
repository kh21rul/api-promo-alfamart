<?php

namespace App\Services;

use App\Models\Datauji;

interface DataujiService
{
    public function all();
    public function store(array $data);
    public function update(Datauji $datauji, array $data);
    public function delete(Datauji $datauji);
}
