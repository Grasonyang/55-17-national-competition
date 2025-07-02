<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'products';
    protected $primaryKey = 'gtin';
    public $incrementing = false;
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gtin'=> 'string',
        'company_id'=> 'integer',
        'name'=> 'string',
        'name_in_French'=> 'string',
        'description'=> 'string',
        'description_in_French'=> 'string',
        'brand'=> 'string',
        'origin'=> 'string',
        'gross_weight'=> 'integer',
        'net_content_weight'=> 'integer',
        'weight_unit'=> 'string',
        'is_active'=>'integer',
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
        'gtin',
        'name',
        'name_in_French',
        'description',
        'description_in_French',
        'brand',
        'origin',
        'gross_weight',
        'net_content_weight',
        'weight_unit',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];
    public function company(){
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class, 'gtin', 'gtin');
    }
}
