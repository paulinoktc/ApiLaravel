<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContratoResource extends JsonResource
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
            'cliente_id' => $this->id,
            'numero_contrato' => $this->numero_contrato,
            'monto' => $this->monto,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_fin' => $this->fecha_fin
        ];
    }

    
}
