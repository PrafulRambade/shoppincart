<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function productsList(){
        return view('admin.products');
    }
    public function addCategory(){
        return view('admin.category');
    }
}
