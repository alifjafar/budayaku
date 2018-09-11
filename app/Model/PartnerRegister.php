<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartnerRegister extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'address',
        'slug',
        'id_card',
    ];
}
