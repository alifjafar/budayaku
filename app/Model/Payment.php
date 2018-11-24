<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'user_id', 'bank_id', 'booking_number', 'bank_name', 'account_number', 'account_name', 'amount', 'image', 'date'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class,'bank_id','id');
    }
}
