<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TaskType;
class TaskTypeStatus extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "task_type"=>new TaskType($this['task_type']),
            "total_success"=>new TaskType($this['total_success']),
            "total_failed"=>new TaskType($this['total_failed']),
            "total_count"=>new TaskType($this['total_count']),
        ];
    }
}
