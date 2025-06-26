<?php
namespace App\Services;

use App\Models\Product;

class GTIN
{
    public string $code;

    public function generate(): string
    {
        do {
            $base = str_pad((string) rand(0, 999999999999), 13, '0', STR_PAD_LEFT);
            $checkDigit = $this->calculateCheckDigit($base);
            $code = $base . $checkDigit;
        } while (Product::where('gtin', $code)->exists());

        $this->code = $code;
        return $code;
    }

    private function calculateCheckDigit(string $code): int
    {
        $sum = 0;
        for ($i = 0; $i < strlen($code); $i++) {
            $digit = (int) $code[$i];
            $sum += ($i % 2 === 0) ? $digit : $digit * 3;
        }

        return (10 - ($sum % 10)) % 10;
    }
}
