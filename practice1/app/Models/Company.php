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
        'user_id',
        'company_name',
        'company_address',
        'company_phone',
        'company_email',
        'owner_name',
        'owner_phone',
        'owner_email',
        'contact_name',
        'contact_phone',
        'contact_email',
        'is_active'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function products(){
        return $this->hasMany(Product::class, 'company_id', 'id');
    }
}
