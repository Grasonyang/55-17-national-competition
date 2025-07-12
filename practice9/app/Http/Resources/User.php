<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'email'=> $this->email,
            'nickname'=> $this->nickname,
            'profile_image'=> $this->profile_image,
            'type'=> $this->type,
            'created_at'=> $this->created_at?->format("Y-m-d\Th:i:s"),
        ];
    }
}
