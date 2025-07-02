<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Company extends Model
{
    use HasFactory;
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'user_id'=> 'integer',
        'name'=> 'string',
        'address'=> 'string',
        'phone'=> 'string',
        'email'=> 'string',
        'contact_address'=> 'string',
        'contact_phone'=> 'string',
        'contact_email'=> 'string',
        'is_active'=> 'integer',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'contact_address',
        'contact_phone',
        'contact_email',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function products(){
        return $this->hasMany(Product::class,'company_id','id');
    }
}
