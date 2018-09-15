<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderDetail;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function onProcess(Request $request)
    {
//        $validator =  $this->validate($request, [
//           'provider_id' => 'required'
//        ]);
//
//        $checkOrder = OrderDetail::where('product_id', $request->product_id)->first();
//
//        $curPeriod = CarbonPeriod::create($checkOrder->start_date, $checkOrder->end_date);
//        $reqPeriod = CarbonPeriod::create($request->start_date, $request->end_date);
//
//        $curDates = $curPeriod->toArray();
//        $reqDates = $reqPeriod->toArray();
//        $exist = 0;
//        if ($checkOrder) {
//
//            foreach ($curDates as $cd)
//            {
//                foreach ($reqDates as $rd){
//                    $cd['date'] == $rd['date'];
//                    $exist++;
//                }
//            }
//
//            return $exist;
//            if ($checkOrder->start_date <= $request->start_date && $checkOrder->end_date <= $request->end_date) {
//
//                $orderProcess = $request->all();
//                return view('budayaku.formpembayaran');
//            }
//            else {
//                Session::flash('exist', 'Gagal');
//                return redirect()->back();
//            }
//        }

        return view('budayaku.formpembayaran');
    }
}
