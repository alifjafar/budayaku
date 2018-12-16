<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRegister as register;
use App\Model\Partner;
use App\Model\User;
use App\Notifications\PartnerRegister;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
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
        $user = User::whereIn('role_id', [1,2])->get();

        $validated = $request->validated();
        $fileName =  $validated['name'] . '-' . uniqid() . '.' . str_slug($validated['id_card']->getClientOriginalExtension());
        $path = 'idcard';
        $validated['status'] = "Pending";

        Storage::disk('public')->putFileAs($path, $validated['id_card'], $fileName, 'public');
        $validated['id_card'] = $path . '/' . $fileName;

        Partner::create($validated);

        Notification::send($user, new PartnerRegister(Auth::user()->profile->name));

        Session::flash('success', 'Pendaftaran Berhasil ! , Tim kami akan segera memverifikasi permintaanmu');
        return redirect()->route('dashboard.client')->with(['success' => 'Berhasil Mendaftar Menjadi Partner']);

    }
}
