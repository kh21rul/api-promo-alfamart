<?php

namespace App\Services;

use App\Models\Shop;

interface ShopService
{
    public function all();
    public function store(array $data);
    public function update(Shop $shop, array $data);
    public function delete(Shop $shop);
}
