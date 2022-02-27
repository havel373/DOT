<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    
    public function index(Request $request)
    {
        if($request->ajax() ){
            $collection = Category::get();
            return view('category.list',compact('collection'));
        }
        return view('category.main');
    }

    public function create()
    {
        return view('category.input',['category' => new Category]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }
       $category = New Category;
       $category->name = Str::title($request->name);
       $category->description = $request->description;
       $category->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Category ' . $request->name . ' Saved',
        ]);
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('category.input', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            } elseif ($errors->has('description')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('description'),
                ]);
            }
        }
       $category->name = Str::title($request->name);
       $category->description = $request->description;
       $category->update();
        return response()->json([
            'alert' => 'success',
            'message' => 'Category ' . $request->name . ' Updated',
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'alert' => 'success',
            'message' => 'Category ' . $category->name . ' Deleted',
        ]);
    }
}
