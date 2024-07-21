<?php

namespace App\Services\Impl;

use App\Models\Shop;
use App\Models\Roishop;
use App\Services\RoishopService;

class RoishopServiceImpl implements RoishopService
{
    public function all()
    {
        return Roishop::latest()->get();
    }

    public function store(array $data)
    {
        return $this->save(new Roishop(), $data);
    }

    public function update(Roishop $roishop, array $data)
    {
        return $this->save($roishop, $data);
    }

    public function delete(Roishop $roishop)
    {
        $roishop->delete();
    }

    private function save(Roishop $roishop, array $data)
    {
        $standart_industri = $this->getShop($data['shop_id']);
        $nilai_roi = ($data['laba_bersih'] / $data['total_aktiva']) * 100;

        if ($nilai_roi >= $standart_industri) {
            $kondisi = 'Baik';
        } else {
            $kondisi = 'Kurang Baik';
        }

        $roishop->shop_id = $data['shop_id'];
        $roishop->tahun = $data['tahun'];
        $roishop->laba_bersih = $data['laba_bersih'];
        $roishop->total_aktiva = $data['total_aktiva'];
        $roishop->roi = number_format($nilai_roi, 2);
        $roishop->kondisi = $kondisi;

        $roishop->save();

        return  $roishop;
    }

    private function getShop($shop_id)
    {
        $shop = Shop::find($shop_id);
        return $shop->standart_industri;
    }
}
