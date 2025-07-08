<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\task_input;
use App\Models\task_output;
use App\Models\task_type;
use App\Models\worker;

class task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_type_id',
        'user_id',
        'worker_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function task_inputs(){
        return $this->hasMany(task_input::class);
    }
    public function task_outputs(){
        return $this->hasMany(task_output::class);
    }
    public function task_types(){
        return $this->hasMany(task_type::class);
    }
    public function workers(){
        return $this->hasMany(worker::class);
    }
}
