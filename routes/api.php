<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::get('categories/search/{name}','App\Http\Controllers\Api\CategoryController@search');
Route::get('products/search/{name}','App\Http\Controllers\Api\ProductController@search');
Route::apiResource('categories','App\Http\Controllers\Api\CategoryController');
Route::apiResource('products','App\Http\Controllers\Api\ProductController');