<?php

use App\Model\Category;

function getCategory()
{
    $cat = Category::all();
    return $cat;
}

function getRelatedPost($id, $product_id)
{
    $product = \App\Model\Product::whereHas('category', function ($q) use ($id) {
        return $q->where('id', $id);
    })->where('id', '<>', $product_id)->get();

    return $product;
}
