<?php

namespace App\Http\Resources;

use App\Models\Contratos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientesResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
            'created_at' => $this->created_at
                ? Carbon::parse($this->created_at)->timezone('America/Mexico_City')->format('d/m/Y H:i')
                : null,
            'updated_at' => $this->updated_at
                ? Carbon::parse($this->updated_at)->timezone('America/Mexico_City')->format('d/m/Y H:i')
                : null,
            'contratos' => ContratoResource::collection($this->whenLoaded('contratos')),
        ];
    }
}
