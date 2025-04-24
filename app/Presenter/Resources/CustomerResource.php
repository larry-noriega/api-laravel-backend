<?php

namespace App\Presenter\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "typeDocument" => $this->type_document,
            "numberDocument" => $this->number_document,
            "name" => $this->name,
            "email" => $this->email,
            "preferences" => $this->preferences
        ];
    }
}
