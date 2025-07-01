<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'name'=>'string',
        'email'=>'string',
        'password'=>'string',
        'role'=>'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function isAdmin(){
        return $this->role==='admin';
    }
    public function isUser(){
        return $this->role==='admin';
    }
    public function canManage($resource=null){
        if(isAdmin())
            return true;
        else{
            return $resource && $this->id === $resource->user_id;
        }
    }
}
