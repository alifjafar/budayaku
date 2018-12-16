<?php

use App\Model\Category;
use App\Model\Product;

function getCategory()
{
    $cat = Category::all();
    return $cat;
}

function getRelatedPost($product_id)
{
    $product = Product::where('id', '<>', $product_id)->get();

    return $product->random();
}
