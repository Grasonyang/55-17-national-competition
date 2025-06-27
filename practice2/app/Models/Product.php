<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $fillable = [
        'gtin',
        'company_id',
        'name',
        'name_in_french',
        'description',
        'description_in_french',
        'brand',
        'origin',
        'gross_weight',
        'net_content_weight',
        'weight_unit',
        'status'
    ];
    
    protected $hidden = [
        // 'password',
    ];
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function product_images(){
        return $this->hasMany(ProductImage::class, 'product_id', 'gtin');
    }
}
