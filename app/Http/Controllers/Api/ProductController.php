<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if(Product::count() < 1){
            return response()->json(['Result' => 'No data'],200);
        }else{
            return ProductResource::collection(
                Product::get()
            );
        }
    }


    public function search($name){
        $result = Product::where('name','LIKE','%' .$name. '%')->get();
        if(count($result)){
            return Response()->json($result);
        }
        else
        {
            return response()->json(['Result' => 'No Data not found'], 404);
        }
    }

    public function show($id)
    {
        $check = Product::find($id);
        if($check === null){
            return response()->json(['message'=>'Product Not Found!'],404);
        }
        return new ProductResource(Product::find($id));
    }

}
