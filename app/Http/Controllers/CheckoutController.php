<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\StoreServices;

class CheckoutController extends Controller
{
    //display checkout
    public function index(){
        $cart_products = new StoreServices();
        $cart_products = $cart_products->getCartProducts(session()->get('kosarica'));

        return view('frontend.checkout')->with('cart_products', $cart_products)
                                        ->with('cart', session()->get('kosarica'));
    }

    //finish order
    public function order(){
        
    }
}
