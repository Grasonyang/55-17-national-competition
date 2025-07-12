<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'status'=>$this->status,
            'updated_at'=>$this->updated_at?->format("Y-m-d\Yh:i:s"),
            'created_at'=>$this->updated_at?->format("Y-m-d\Yh:i:s"),
        ];
    }
}
