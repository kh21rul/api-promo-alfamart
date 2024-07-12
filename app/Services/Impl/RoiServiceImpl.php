<?php

namespace App\Services\Impl;

use App\Models\Roi;
use App\Services\RoiService;

class RoiServiceImpl implements RoiService
{
    public function all()
    {
        return Roi::all();
    }

    public function store(array $data)
    {
        return $this->save(new Roi(), $data);
    }

    public function update(Roi $roi, array $data)
    {
        return $this->save($roi, $data);
    }

    public function delete(Roi $roi)
    {
        $roi->delete();
    }

    private function save(Roi $roi, array $data)
    {
        $nilai_roi = ($data['laba_bersih'] / $data['total_aktiva']) * 100;

        if ($nilai_roi >= $data['standart_industri']) {
            $kondisi = 'Baik';
        } else {
            $kondisi = 'Kurang Baik';
        }

        $roi->tahun = $data['tahun'];
        $roi->laba_bersih = $data['laba_bersih'];
        $roi->total_aktiva = $data['total_aktiva'];
        $roi->roi = $nilai_roi;
        $roi->standart_industri = $data['standart_industri'];
        $roi->kondisi = $kondisi;

        $roi->save();

        return $roi;
    }
}
