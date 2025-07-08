<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\task;

class task_input extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_id',
        'name',
        'type',
    ];
    public function task(){
        return $this->belongsTo(task::class);
    }
}
