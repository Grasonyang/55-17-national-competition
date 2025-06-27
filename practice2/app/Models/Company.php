<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companys';
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'owner_name',
        'owner_address',
        'owner_email',
        'contact_name',
        'contact_address',
        'contact_email',
        'status'
    ];
    
    protected $hidden = [
        // 'password',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user', 'company_id', 'user_id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'company_id', 'id');
    }
}
