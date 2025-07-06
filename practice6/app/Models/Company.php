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
        'contact_name',
        'contact_number',
        'contact_address',
        'status'
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
        'contact_name '=>'string',
        'contact_number '=>'string',
        'contact_address'=>'string',
        'status'=>'boolean',
        'deleted_at' => 'datetime',
        'updated_at' => 'datetime',
        'created_at' => 'datetime',
    ];
    // 相對User
    public function user(){
        return $this->belongsTo(User::class);
    }
    // 一對多Company
    public function products(){
        return $this->hasMany(Product::class);
    }
}
