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
    public $primaryKey="gtin";
    public $incrementing=false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'gtin',
        'company_id',
        'name',
        'name_in_f',
        'description',
        'description_in_f',
        'brand',
        'origin',
        'gross_weight',
        'net_content_weight',
        'unit',
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
        'gtin'=>"string",
        'company_id'=>'integer',
        'name'=>"string",
        'name_in_f'=>"string",
        'description'=>"string",
        'description_in_f'=>"string",
        'brand'=>"string",
        'origin'=>"string",
        'gross_weight'=>'integer',
        'net_content_weight'=>'integer',
        'unit'=>"string",
        'status'=>'boolean',
        'deleted_at' => 'datetime',
        'created_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'gtin','gtin');
    }
}
