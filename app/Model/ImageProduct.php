<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $table = 'image_products';

    protected $fillable = [
        'filename',
        'path',
        'size',
    ];

    public function productimage()
    {
        return $this->belongsToMany(Product::class,'product_image','image_id','product_id');
    }

}
