<?php

use Illuminate\Http\Request;
use App\Http\Controllers\FinalApi;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// product list
Route::get('product/lists' , [FinalApi::class , 'products']);


// category list
Route::get('category/lists' , [FinalApi::class , 'categories']);

// create category
Route::post('create/categories' , [FinalApi::class , 'create_categories']);


// contact create and get all info
Route::post('create/contact' , [FinalApi::class , 'create_contact']);


// delete category post method
Route::post('delete/category' , [FinalApi::class , 'detete_category']);


// delete category get method
Route::get('delete/category/{id}' , [FinalApi::class , 'delete_category_id']);


// product list with 1 2 3 count
Route::get('product/lists/{id}' , [FinalApi::class , 'product_one']);


// update category products
Route::post('product/update' , [FinalApi::class , 'update_pro']);


// update category name
Route::post('category/update' , [FinalApi::class , 'update_cat']);
