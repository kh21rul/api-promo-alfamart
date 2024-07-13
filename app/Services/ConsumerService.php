<?php

namespace App\Services;

use App\Models\Consumer;

interface ConsumerService
{
    public function all();
    public function store(array $data);
    public function delete(Consumer $consumer);
}
