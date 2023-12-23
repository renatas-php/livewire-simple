<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function manufacturer() 
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function getFormatedPriceAttribute()
    {
        return '€' . number_format($this->price / 100, 2, '.', '.');
    }
}
