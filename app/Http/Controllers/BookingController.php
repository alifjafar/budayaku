<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function preStore(Request $request)
    {
        $product = Product::where('id', $request['id'])->first();

        $product['booking_number'] = autonumber('bookings', 'id', 'BDY-');
        $product['booking_date'] = $request['booking_date'];
        $product['user'] = Auth::user();

        return view('budayaku.formpembayaran', compact('product'));
    }

    public function store(Request $request)
    {

    }
}
