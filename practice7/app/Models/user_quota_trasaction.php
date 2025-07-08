<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class user_quota_trasaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'value',
        'reason',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
