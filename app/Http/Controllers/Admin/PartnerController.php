<?php

namespace App\Http\Controllers\Admin;

use App\Model\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('backoffice.partner.index', compact('partners'));
    }

    public function update(Request $request, Partner $partner)
    {
        $partner->update($request->all());

        Session::flash('success', 'Berhasil Mengubah Status Partner');

        return redirect()->route('partners.index');
    }
}
