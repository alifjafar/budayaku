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

    public function explore(Request $request)
    {
        $raw = Product::whereHas('category');
        if($request->get('cat') && $request->get('cat') != 'all')
        {
            $raw->where('category_id', $request->cat);
        }

        if($request->get('priceMin'))
        {
            $raw->where('price', '>=', $request->priceMin);
        }

        if($request->get('priceMax'))
        {
            $raw->where('price', '>=', $request->priceMax);
        }

        $products = $raw->orderBy('id','desc')->paginate(12);


        return view('budayaku.explore', compact('products'));
    }

    public function search(Request $request)
    {
        $s = $request->query('s');

        // Query and paginate result
        $products = Product::where('name', 'like', "%$s%")
            ->orWhere('description', 'like', "%$s%")
            ->paginate(6);


        return view('budayaku.search', ['products' => $products, 's' => $s ]);
    }
}
