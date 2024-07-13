<?php

namespace App\Services\Impl;

use App\Models\Consumer;
use App\Services\ConsumerService;

class ConsumerServiceImpl implements ConsumerService
{
    public function all()
    {
        return Consumer::all();
    }

    public function store(array $data)
    {
        return $this->save(new Consumer(), $data);
    }

    public function delete(Consumer $consumer)
    {
        $consumer->delete();
    }

    private function save(Consumer $consumer, array $data)
    {
        $consumer->nama = $data['nama'];
        $consumer->email = $data['email'];
        $consumer->usia = $data['usia'];
        $consumer->jenis_kelamin = $data['jenis_kelamin'];
        $consumer->pekerjaan = $data['pekerjaan'];
        $consumer->pendapatan_perbulan = $data['pendapatan_perbulan'];
        $consumer->lokasi_cabang = $data['lokasi_cabang'];
        $consumer->jenis_promo = $data['jenis_promo'];
        $consumer->jumlah_produk = $data['jumlah_produk'];
        $consumer->alasan = $data['alasan'];
        $consumer->tingkat_kepuasan = $data['tingkat_kepuasan'];

        $consumer->save();

        return $consumer;
    }
}
