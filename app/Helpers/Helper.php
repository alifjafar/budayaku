<?php

use App\Model\Category;
use App\Model\Product;

function getCategory()
{
    $cat = Category::all();
    return $cat;
}

function getRelatedPost($id, $product_id)
{
    $product = Product::whereHas('category', function ($q) use ($id) {
        return $q->where('id', $id);
    })->where('id', '<>', $product_id)->get();

    return $product;
}
