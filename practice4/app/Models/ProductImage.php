<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
class ProductImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'gtin',
        'image_url',
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
        'image_url'=>'string',
        'created_at'=>'datetime',
        'updated_at'=>'datetime',
    ];
    public function product(){
        return $this->belongsTo(Product::class,"gtin","gtin");
    }
}
