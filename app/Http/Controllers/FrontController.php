<?php

namespace App\Http\Controllers;
use App\Models\Product;

class FrontController extends Controller
{
    public function home(){
        $products = Product::all();

        return view('Front.baseFront', compact('products'));
    }

    public function detail($id){
        $products = Product::findOrFail($id);
        return view('Front.Page.detailProduct', compact('products'));
    }

    public function likes(){

        return view('Front.Page.likesProduct');
    }
}
