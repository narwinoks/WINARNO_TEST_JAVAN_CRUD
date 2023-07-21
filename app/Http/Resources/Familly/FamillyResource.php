<?php

namespace App\Http\Resources\Familly;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FamillyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' =>$this->id,
            'parent' =>$this->parent->name ?? null,
            'name' =>$this->name,
            'gender' =>$this->gender

        ];
    }
}
