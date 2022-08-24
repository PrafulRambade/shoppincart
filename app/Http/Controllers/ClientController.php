<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('client.home');
    }
    public function shop(){
        return view('client.shop');
    }
    public function wishlist(){
        return view('client.wishlist');
    }
    public function single_product(){
        return view('client.product_single');
    }
    public function cart(){
        return view('client.cart');
    }
    public function checkout(){
        return view('client.checkout');
    }
    public function about(){
        return view('client.about');
    }
    public function blog(){
        return view('client.blog');
    }
    public function blog_single(){
        return view('client.blog_single');
    }
    public function contact(){
        return view('client.contact');
    }
}
