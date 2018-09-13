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
}
