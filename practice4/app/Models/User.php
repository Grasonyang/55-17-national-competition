<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Company;
use DateTimeInterface;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        "access_token",
        "role",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'access_token',
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
        "access_token"=>'string',
        'role'=>'string',
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d\TH:i:s');
    }
    public function genAccessToken(){
        $this->access_token = hash('sha256', $this->email);
        $this->save();
        return $this->access_token;
    }
    public function company(){
        return $this->hasMany(Company::class);
    }
}
