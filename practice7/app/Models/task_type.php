<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\task;
use App\Models\worker;
use App\Models\task_type_input;
use App\Models\task_type_output;


class task_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cost_quota',
    ];
    public function task(){
        return $this->belongsTo(task::class);
    }
    public function workers(){
        return $this->belongsToMany(worker::class, 'worker_task_types', 'task_type_id','worker_id');
    }
    public function task_type_inputs(){
        return $this->hasMany(task_type_input::class);
    }
    public function task_type_outputs(){
        return $this->hasMany(task_type_output::class);
    }
}
