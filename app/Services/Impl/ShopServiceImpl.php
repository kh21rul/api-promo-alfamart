<?php

namespace App\Services\Impl;

use App\Models\Shop;
use App\Services\ShopService;

class ShopServiceImpl implements ShopService
{
    public function all()
    {
        return Shop::latest()->get();
    }

    public function store(array $data)
    {
        return $this->save(new Shop(), $data);
    }

    public function update(Shop $shop, array $data)
    {
        return $this->save($shop, $data);
    }

    public function delete(Shop $shop)
    {
        $shop->delete();
    }

    private function save(Shop $shop, array $data)
    {
        $shop->nama_toko = $data['nama_toko'];
        $shop->standart_industri = $data['standart_industri'];
        $shop->save();

        return  $shop;
    }
}
