<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];

    public function product()
    {
        return $this->hasMany(Product::class,'category_id', 'id');
    }
}
