<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRegister as register;
use App\Model\PartnerRegister;
use Illuminate\Http\Request;

class PartnerRegisterController extends Controller
{
    public function create()
    {
        return view('budayaku.partner.daftar');
    }

    public function partnerRegister(register $request)
    {
        $validated = $request->validated();

        return dd($validated);


    }
}
