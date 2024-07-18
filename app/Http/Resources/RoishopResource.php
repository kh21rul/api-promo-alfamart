<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoishopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shop_id' => $this->shop_id,
            'tahun' => $this->tahun,
            'laba_bersih' => $this->laba_bersih,
            'total_aktiva' => $this->total_aktiva,
            'roi' => $this->roi,
            'kondisi' => $this->kondisi,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'toko' => $this->whenLoaded('shop'),
        ];
    }
}
