<?php

namespace App\Imports;

use App\Models\Dataset;
use App\Services\DatasetService;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Collection;

class DatasetsImport implements ToCollection, WithHeadingRow
{
    private DatasetService $datasetService;
    protected $importedData = [];

    public function __construct(DatasetService $datasetService)
    {
        $this->datasetService = $datasetService;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $data = [
                'nama_toko' => $row['nama_toko'] ?? null,
                'Y' => $row['total_transaksi'] ?? null,
                'X1' => $row['spesial_mingguan'] ?? null,
                'X2' => $row['tebus_murah'] ?? null,
                'X3' => $row['serba_gratis'] ?? null,
            ];

            // Validasi data sebelum menyimpannya
            if ($this->validateRow($data)) {
                $importedRecord = $this->datasetService->store($data);
                $this->importedData[] = $importedRecord;
            }
        }
    }

    private function validateRow($data)
    {
        // Pastikan semua field tidak null
        return $data['nama_toko'] && $data['Y'] && $data['X1'] && $data['X2'] && $data['X3'];
    }

    public function getImportedData()
    {
        return $this->importedData;
    }
}
