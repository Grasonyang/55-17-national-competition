<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Models\Company;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    public $table = "products";
    public $primaryKey = "gtin";
    public $incrementing = false;
    protected $fillable = [
        'gtin',
        'company_id',
        'name',
        'name_in_French',
        'description',
        'description_in_French',
        'brand',
        'origin',
        'gross_weight',
        'net_content_weight',
        'weight_unit',
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
        'gtin'=>'string',
        'company_id'=>'integer',
        'name'=>'string',
        'name_in_French'=>'string',
        'description'=>'string',
        'description_in_French'=>'string',
        'brand'=>'string',
        'origin'=>'string',
        'gross_weight'=>'integer',
        'net_content_weight'=>'integer',
        'weight_unit'=>'string',
        'is_active'=>'boolean',
        'deleted_at'=>'datetime',
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function products(){
        return $this->hasMany(ProductImage::class,'gtin','gtin');
    }
}
