<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'price',
        'video',
        'partner_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function provider()
    {
        return $this->belongsTo(Parner::class, 'provider_id', 'id');
    }

    public function productimage()
    {
        return $this->belongsToMany(ImageProduct::class,'product_image','product_id','image_id');
    }
}
