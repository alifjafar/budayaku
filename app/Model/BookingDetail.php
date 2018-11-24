<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id', 'start_date', 'end_date', 'province', 'district', 'city', 'address', 'notes'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id','id');
    }
}
