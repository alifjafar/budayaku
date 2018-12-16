<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookingResource;
use App\Model\Booking;
use App\Model\BookingDetail;
use App\Model\Partner;
use App\Model\Product;
use App\Notifications\BookingNotification;
use App\Notifications\PartnerRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BookingController extends Controller
{
    public function index()
    {
        $booking = Booking::where('user_id', Auth::user()->id)->get();

        return BookingResource::collection($booking);
    }

    public function preStore(Request $request)
    {
        $product = Product::where('id', $request['id'])->first();

        $product['booking_date'] = $request['booking_date'];
        $product['user'] = Auth::user();

        return view('budayaku.formpembayaran', compact('product'));
    }

    public function store(Request $request)
    {
        $product = $request->all();

        $user = Product::where('id', $product['product_id'])->first()->provider->user;


        $product['booking_number'] = autonumber('bookings', 'id', 'BDY-');
        $product['user_id'] = Auth::user()->id;
        $product['status'] = 'unpaid';

        $date = array_map('trim', explode('-', $request['booking_date']));
        $product['start_date'] = Carbon::parse($date[0])->format('Y-m-d');
        $product['end_date'] = Carbon::parse($date[1])->format('Y-m-d');

        $booking = Booking::create($product);

        BookingDetail::create([
            'booking_id' => $booking->id,
            'start_date' => $product['start_date'],
            'end_date' => $product['end_date'],
            'province' => $product['province'],
            'district' => $product['district'],
            'city' => $product['city'],
            'address' => $product['address']
        ]);

        Notification::send($user, new BookingNotification(Auth::user()->profile->name));

        return redirect()->route('booking-list');

    }
}
