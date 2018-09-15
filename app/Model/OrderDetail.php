<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'start_date',
        'end_date',
        'keberangkat',
        'provinsi',
        'kota',
        'kecamatan',
        'alamat'
    ];

    public function product()
    {
        $this->belongsTo(Product::class,'product_id','id');
    }

    public function order()
    {
        $this->belongsTo(Order::class, 'order_id','id');
    }
}
