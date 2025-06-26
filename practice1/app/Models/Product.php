<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\Product_Image;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'is_active',
    ];
    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id')->withTrashed();
    }
    public function product_image(){
        return $this->hasMany(Product_Image::class, 'gtin_id', 'gtin');
    }
}
