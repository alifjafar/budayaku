<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return $this->belongsTo(Partner::class, 'partner_id', 'id');
    }

    public function productimage()
    {
        return $this->belongsToMany(ImageProduct::class,'product_image','product_id','image_id');
    }

    public function booking()
    {
        return $this->hasMany(Booking::class,'product_id','id');
    }

    public function rating()
    {
        return $this->hasMany(Rating::class,'product_id','id');
    }

    public function getImageAttribute()
    {
        return ($this->productimage[0]->path . '/' . $this->productimage[0]->filename);
    }

    public function getHargaAttribute()
    {
        return ('Rp' . number_format($this->price,2,',','.'));
    }

    public function getVideoIdAttribute()
    {
        $url = $this->video;
        parse_str(parse_url($url, PHP_URL_QUERY), $myvideo);
        return $myvideo['v'];
    }

    public function scopeSelf($q)
    {
        return $q->where('partner_id', Auth::user()->provider->id);
    }
}
