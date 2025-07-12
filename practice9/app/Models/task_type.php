<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\task;
use App\Models\worker;
use App\Models\task_type_input;
use App\Models\task_type_output;

class task_type extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'cost_quota',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        
    ];
    public function tasks(){
        return $this->hasMany(task::class);
    }
    public function workers(){
        return $this->belongsToMany(worker::class, 'worker_task_types', 'task_type_id', 'worker_id');
    }
    public function task_type_inputs(){
        return $this->hasMany(task_type_input::class);
    }
    public function task_type_outputs(){
        return $this->hasMany(task_type_output::class);
    }
    
}
