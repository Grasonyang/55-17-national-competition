<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Product_Image extends Model
{
    use HasFactory;
    protected $table = 'product_images';
    public $timestamps = false;
    protected $fillable = [
        'gtin_id',
        'image_path',
    ];
    public function product(){
        return $this->belongsTo(Product::class, 'gtin_id', 'gtin')->withTrashed();
    }
}
