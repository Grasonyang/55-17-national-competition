<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\task_type;
use App\Models\worker;
use App\Models\task_input;
use App\Models\task_output;


class task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'task_type_id',
        'user_id',
        'worker_id',
        'status',
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
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function task_type(){
        return $this->belongsTo(task_type::class);
    }
    public function worker(){
        return $this->belongsTo(worker::class);
    }
    public function task_inputs(){
        return $this->hasMany(task_input::class);
    }
    public function task_outputs(){
        return $this->hasMany(task_output::class);
    }
    
}
