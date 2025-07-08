<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\task;
use App\Models\task_type;

// use App\Models\task;

class worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'access_token',
    ];
    public function task(){
        return $this->belongsTo(task::class);
    }
    public function task_types(){
        return $this->belongsToMany(task_type::class, 'worker_task_types', 'worker_id','task_type_id');
    }
}
