<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $category = Category::get();
        return view('product.input',['product'=> new Product,'category'=>$category]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }
       $product = New Product;
       $product->name = Str::title($request->name);
       $product->category_id= $request->category;
       $product->description = $request->description;
       $product->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product ' . $request->name . ' Saved',
        ]);
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('product.input',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('category')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('category'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }
       $product->name = Str::title($request->name);
       $product->category_id= $request->category;
       $product->description = $request->description;
       $product->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product ' . $request->name . ' Updated',
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Product ' . $product->name . ' Deleted',
        ]);
    }
}
