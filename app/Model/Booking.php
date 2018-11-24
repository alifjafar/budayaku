<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_number', 'product_id', 'user_id', 'status', 'total_amount'
    ];


    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function detail()
    {
        return $this->hasOne(BookingDetail::class,'booking_id','id');
    }
}
