<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'booking_number' => $this->booking_number,
            'product' => $this->product,
            'status' => $this->status,
            'total_amount' => $this->total_amount,
            'detail' => $this->detail,
            'image' => $this->product->productimage,
            'provider' => $this->product->provider,
            'category' => $this->product->category
        ];
    }
}
