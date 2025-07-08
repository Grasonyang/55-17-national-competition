<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;

use App\Models\task;
use App\Models\user_quota_transaction;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password_hash',
        'nickname',
        'profile_image',
        'type',
        'access_token',
    ];

    /**
     * The attributes that have default values.
     *
     * @var array
     */
    // protected $attributes = [
    //     'type' => 'user',
    // ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password_hash',
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
    public function tasks(){
        return $this->hasMany(task::class);
    }
    public function user_quota_transactions(){
        return $this->hasMany(user_quota_transaction::class);
    }
    
}
