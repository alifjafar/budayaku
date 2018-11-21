<?php

namespace App\Http\Controllers;

use App\Model\ImageProduct;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::self()->get();

        return view('budayaku.user.services.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('budayaku.user.services.product.insert');
    }

    public function store(Request $request)
    {
        $request['slug'] = createSlug($request['name']);
        $request['partner_id'] = Auth::user()->provider->id;
        $product = Product::create($request->all());

        $product->productimage()->sync($request['product_images']);

        Session::flash('success', 'Berhasil');
        return redirect()->back();
    }

    public function uploadImage(Request $request)
    {
        $uploadedFile = $request->file('file');

        $fileName = uniqid() . $uploadedFile->getClientOriginalName();
        $path = 'uploads/product/';
        $size = $uploadedFile->getSize();

        Storage::disk('public')->putFileAs($path,$uploadedFile,  $fileName);

        $upload = new ImageProduct;
        $upload->fill([
            'filename' => $fileName,
            'path' => $path,
            'size' => $size,
        ])->save();

        return response()->json([
            'id' => $upload->id
        ]);
    }

    public function deleteImage($id)
    {
        $image = ImageProduct::find($id);

        $fullPath = $image['path'] . $image['filename'];

        Storage::disk('public')->delete($fullPath);

        $image->delete();

        return response('success', 204);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $images = $product->productimage()->get();
        foreach ($images as $img)
        {
            Storage::disk('public')->delete($img->filename);
        }

        $product->delete();

        Session::flash('success', 'Berhasil Menghapus Product');

        return route('product.index');
    }
}
