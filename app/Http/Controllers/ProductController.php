<?php

namespace App\Http\Controllers;

use App\Model\ImageProduct;
use App\Model\Price;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function __construct()
    {
        if(!Auth::user()->isPartner())
        {
            return redirect()->route('partners.index');
        }
    }

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
        if (Auth::user()->provider && Auth::user()->provider->status == "Pending") {
            return back()->with(['pending' => 'Permintaan untuk bermitra belum di approve']);
        }
        return view('budayaku.user.services.product.insert');
    }

    public function store(Request $request)
    {
        $idCollection = new Collection();
        foreach ($request['xtra_price']['name'] as $i => $item) {
            $id = Price::create([
                'name' => $item,
                'price' => $request['xtra_price']['price'][$i]
            ]);

            $idCollection->push($id['id']);
        }

        $request['slug'] = createSlug($request['name']);
        $request['partner_id'] = Auth::user()->provider->id;
        $product = Product::create($request->all());

        $product->additionalprice()->sync($idCollection);
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

        Storage::disk('public')->putFileAs($path, $uploadedFile, $fileName);

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

        if ($product->provider->user->id != Auth::user()->id) {
            return back();
        }

        return view('budayaku.user.services.product.edit', compact('product'));
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
        $idCollection = new Collection();

        foreach ($request['price_id'] as $id) {
            $idCollection->push((int)$id);
        }

        $delete = $product->additionalprice()->whereNotIn('id',$idCollection)->pluck('id');

        if (!empty($delete)) {
            foreach ($delete as $id) {
                Price::find($id)->delete();
            }
        }


        if ($request['xtra_price']) {
            foreach ($request['xtra_price']['name'] as $i => $item) {
                $id = Price::create([
                    'name' => $item,
                    'price' => $request['xtra_price']['price'][$i]
                ]);

                $idCollection->push($id['id']);
            }
        }

        $product->update($request->all());

        $product->additionalprice()->sync($idCollection);
        $product->productimage()->syncWithoutDetaching($request['product_images']);

        Session::flash('success', 'Berhasil');
        return redirect()->back();
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
        foreach ($images as $img) {
            Storage::disk('public')->delete($img->filename);
        }

        $product->delete();

        Session::flash('success', 'Berhasil Menghapus Product');

        return route('product.index');
    }
}
