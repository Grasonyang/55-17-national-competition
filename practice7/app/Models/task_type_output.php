<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\task_type;
class task_type_output extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_type_id',
        'name',
        'type',
    ];
    public function task_type(){
        return $this->belongsTo(task_type::class);
    }
}
