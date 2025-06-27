<?php

namespace App\Services;

use App\Models\Product;

class Gtin
{
    public static function generate(){
        $number = rand(0,9999999999999);
        $gtin = str_pad($number, 13, '0', STR_PAD_LEFT);
        $gtin = self::addCheckDigit($gtin);
        $find = Product::where('gtin', $gtin)->first();
        if($find){
            return self::generate();
        }else{
            return $gtin;
        }
    }
    public static function addCheckDigit($gtin){
        $sum = 0;
        for($i=0;$i<strlen($gtin);$i++){
            if($i%2==0){
                $sum+= intval($gtin[$i]);
            }else{
                $sum+= intval($gtin[$i])*3;
            }
        }
        $checkDigut = $sum % 10;
        return $gtin.$checkDigut;
    }
    public static function checkGtin($gtin){
        $product = Product::where('gtin', $gtin)->first();
        // dd($product );
        if($product && $product->status == true && $product->company_id != null && $product->company && $product->company->status == true){
            return "Valid!!!";
        }else{
            return "Invalid!!!";
        }
    }
}
