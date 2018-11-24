<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRegister as register;
use App\Model\Partner;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Auth;

class PartnerRegisterController extends Controller
{
    public function create()
    {
        if(Auth::user()->isPartner()){
            return redirect()->route('homepage');
        }
        return view('budayaku.partner.daftar');
    }

    public function partnerRegister(register $request)
    {
        $validated = $request->validated();
        $fileName = $validated['name'] . '-' . uniqid() . '.' . str_slug($validated['id_card']->getClientOriginalExtension());
        $validated['status'] = "Pending";

        Storage::disk('public')->putFileAs('idcard', $validated['id_card'], $fileName, 'public');
        $validated['id_card'] = $fileName;

        Partner::create($validated);

        Session::flash('success', 'Pendaftaran Berhasil ! , Tim kami akan segera memverifikasi permintaanmu');
        return redirect()->back();

    }
}
