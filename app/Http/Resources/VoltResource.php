<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoltResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'proprietario' => optional($this->proprietario)->nome,
            'importante' => $this->importante,
            'email' => $this->email,
            'status' => $this->status,
            'media' => $this->media->toArray(),
            'media_count' => $this->media_count,
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
