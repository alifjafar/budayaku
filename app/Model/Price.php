<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'name', 'price'
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class,'product_prices','price_id','product_id');
    }

    public function getHargaAttribute()
    {
        return ('Rp ' . number_format($this->price,2,',','.'));
    }

}
