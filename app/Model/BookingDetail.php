<?php

namespace App\Model;

use Carbon\Carbon;
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

    public function getStartDateAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->format('d M Y');
    }

    public function getEndDateAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->format('d M Y');
    }
}
