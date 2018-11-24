<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name', 'account_number'
    ];


    public function payment()
    {
        return $this->hasMany(Payment::class,'bank_id','id');
    }
}
