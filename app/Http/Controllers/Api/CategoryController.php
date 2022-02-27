<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(
            Category::get()
        );
    }

    public function store(Request $request)
    {
        //
    }

    public function search($name){
        $result = Category::where('name','LIKE','%' .$name. '%')->get();
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
        $check = Category::find($id);
        if($check === null){
            return response()->json(['message'=>'Category Not Found!'],404);
        }
        return new CategoryResource(Category::find($id));
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
