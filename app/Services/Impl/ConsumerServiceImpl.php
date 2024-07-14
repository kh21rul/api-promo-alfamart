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

    public function analysis()
    {
        $data_analysis = [
            'promo_harga_murah' => $this->promoHargaMurah(),
            'promo_kualitas_produk' => $this->kualitasProduk(),
            'promo_variasi_produk' => $this->variasiProduk(),
            'promo_kemasan_menarik' => $this->kemasanMenarik(),
            'kunjungan_alfamart' => $this->kunjunganAlfamart(),
            'promo_paling_menarik' => $this->promoMenarik(),
            'kepuasan_layanan_alfamart' => $this->kepuasanLayananHarga(),
        ];

        return $data_analysis;
    }

    private function promoHargaMurah()
    {
        $promo_harga_murah = [
            'spesial_mingguan' => Consumer::where('jenis_promo', "Spesial Mingguan")->where('alasan', "Harga lebih murah")->count(),
            'serba_gratis' => Consumer::where('jenis_promo', "Serba Gratis")->where('alasan', "Harga lebih murah")->count(),
            'tebus_murah' => Consumer::where('jenis_promo', "Tebus Murah")->where('alasan', "Harga lebih murah")->count(),
        ];

        return $promo_harga_murah;
    }

    private function kualitasProduk()
    {
        $promo_kualitas_produk = [
            'spesial_mingguan' => Consumer::where('jenis_promo', "Spesial Mingguan")->where('alasan', "Kualitas produk")->count(),
            'serba_gratis' => Consumer::where('jenis_promo', "Serba Gratis")->where('alasan', "Kualitas produk")->count(),
            'tebus_murah' => Consumer::where('jenis_promo', "Tebus Murah")->where('alasan', "Kualitas produk")->count(),
        ];

        return $promo_kualitas_produk;
    }

    private function variasiProduk()
    {
        $promo_variasi_produk = [
            'spesial_mingguan' => Consumer::where('jenis_promo', "Spesial Mingguan")->where('alasan', "Variasi produk")->count(),
            'serba_gratis' => Consumer::where('jenis_promo', "Serba Gratis")->where('alasan', "Variasi produk")->count(),
            'tebus_murah' => Consumer::where('jenis_promo', "Tebus Murah")->where('alasan', "Variasi produk")->count(),
        ];

        return $promo_variasi_produk;
    }

    private function kemasanMenarik()
    {
        $promo_kemasan_menarik = [
            'spesial_mingguan' => Consumer::where('jenis_promo', "Spesial Mingguan")->where('alasan', "Kemasan menarik")->count(),
            'serba_gratis' => Consumer::where('jenis_promo', "Serba Gratis")->where('alasan', "Kemasan menarik")->count(),
            'tebus_murah' => Consumer::where('jenis_promo', "Tebus Murah")->where('alasan', "Kemasan menarik")->count(),
        ];

        return $promo_kemasan_menarik;
    }

    private function kunjunganAlfamart()
    {
        $data_kunjungan_alfamart = [
            'listrik_lhokseumawe' => Consumer::where('lokasi_cabang', "LISTRIK-LHOKSEUMAWE")->count(),
            'cunda_lhokseumawe' => Consumer::where('lokasi_cabang', "CUNDA-LHOKSEUMAWE")->count(),
            'darussalam' => Consumer::where('lokasi_cabang', "DARUSSALAM")->count(),
            'merdeka_lhokseumawe' => Consumer::where('lokasi_cabang', "MERDEKA-LHOSEUMAWE")->count(),
            'samudera_baru' => Consumer::where('lokasi_cabang', "SAMUDERA BARU")->count(),
            'bukit_rata' => Consumer::where('lokasi_cabang', "BUKIT RATA")->count(),
            'simpang_kandang' => Consumer::where('lokasi_cabang', "SIMPANG KANDANG")->count(),
            'punteuet' => Consumer::where('lokasi_cabang', "PUNTEUET")->count(),
            'hagu_selatan' => Consumer::where('lokasi_cabang', "HAGU SELATAN")->count(),
            'batuphat_lhokseumawe' => Consumer::where('lokasi_cabang', "BATUPHAT LHOKSEUMAWE")->count(),
            'pase_lhokseumawe' => Consumer::where('lokasi_cabang', "PASE LHOKSEUMAWE")->count(),
            'simpang_buloh' => Consumer::where('lokasi_cabang', "SIMPANG BULOH")->count(),
            'blang_pulo' => Consumer::where('lokasi_cabang', "BLANG PULO")->count(),
            'gampong_panggoi' => Consumer::where('lokasi_cabang', "GAMPONG PANGGOI")->count(),
            'blang_panyang' => Consumer::where('lokasi_cabang', "BLANG PANYANG")->count(),
        ];

        return $data_kunjungan_alfamart;
    }

    private function promoMenarik()
    {
        $promo_paling_menarik = [
            'spesial_mingguan' => Consumer::where('jenis_promo', "Spesial Mingguan")->count(),
            'serba_gratis' => Consumer::where('jenis_promo', "Serba Gratis")->count(),
            'tebus_murah' => Consumer::where('jenis_promo', "Tebus Murah")->count(),
        ];

        return $promo_paling_menarik;
    }

    private function kepuasanLayananHarga()
    {
        $data_kepuasan = [
            'sangat_buruk' => Consumer::where('tingkat_kepuasan', 1)->count(),
            'buruk' => Consumer::where('tingkat_kepuasan', 2)->count(),
            'cukup' => Consumer::where('tingkat_kepuasan', 3)->count(),
            'baik' => Consumer::where('tingkat_kepuasan', 4)->count(),
            'baik_sekali' => Consumer::where('tingkat_kepuasan', 5)->count(),
        ];

        return $data_kepuasan;
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
