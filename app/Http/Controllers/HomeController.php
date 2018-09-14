<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('budayaku.homepage', [
            'products' => Product::with(['productimage', 'category', 'provider'])->get(),
        ]);
    }

    public function getSingle($slug)
    {
        $product = Product::where('slug', $slug)->with(['productimage', 'category', 'provider'])->first();

        if($product){
            return view('budayaku.detailproduct', compact('product'));
        }
        return abort('404');
    }
}
