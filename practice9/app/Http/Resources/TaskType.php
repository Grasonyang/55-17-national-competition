<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\TaskTypeInput;

class TaskType extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "inputs"=>TaskTypeInput::collection(
                $this->withLoaded('task_type_inputs')->sortBy('name')->values()
            ),
            "outputs"=>TaskTypeInput::collection(
                $this->withLoaded('task_type_outputs')->sortBy('name')->values()
            ),
            "cost_quota"=>$this->cost_quota,
            'created_at'=> $this->created_at?->format("Y-m-d\Yh:i:s"),
        ];
    }
}
