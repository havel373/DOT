<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index(Request $request)
    {
        if($request->ajax() ){
            $collection = Product::get();
            return view('product.list',compact('collection'));
        }
        return view('product.main');
    }
}
