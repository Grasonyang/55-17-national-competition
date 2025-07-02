<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Company extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "companies";
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'email',
        'contact_name',
        'contact_phone',
        'contact_email',
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
        'user_id'=>'integer',
        'name'=>'string',
        'address'=>'string',
        'phone'=>'string',
        'email'=>'string',
        'contact_name'=>'string',
        'contact_phone'=>'string',
        'contact_email'=>'string',
        'is_active'=>'boolean',
        'deleted_at'=>'datetime',
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    
}
