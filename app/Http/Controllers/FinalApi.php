<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\contact;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\FinalApi;
use Illuminate\Routing\Controller;

class FinalApi extends Controller
{

// product list
    public function products(){
        $datas = product::get();
        $data = [
            'Products' => $datas
        ];
          return response()->json($data, 200);
    }


// category list

public  function categories(){
    $datas = category::get();
    $data = [
        'Categories' => $datas
    ];
      return response()->json($data, 200);
}


// create category

public function create_categories(Request $request){

    $data = category::create(['name' => $request->name]);
    return response()->json($data, 200);
}


//  create contact

public function create_contact(Request $contact){
    contact::create(['name' => $contact->name ,
    'email' => $contact->email,
    'message' => $contact->message]);

    $contacts = contact::get();

    return response()->json($contacts, 200);
 }


// delete category post

public function detete_category(Request $req){


    $data = category::where('category_id' , $req->id)->first();


    if(isset($data)){
        category::where('category_id' , $req->id)->delete();
        return response()->json(['status' => 'true' , 'about' => 'success'], 200);
    }
    return response()->json(['status' => 'false' , 'about' => 'failed'], 200);



}


// delete get method

public function delete_category_id($id){



    $data = category::where('category_id' , $id)->first();


    if(isset($data)){
        category::where('category_id' , $id)->delete();
        return response()->json(['status' => 'true' , 'about' => 'success'], 200);
    }
    return response()->json(['status' => 'false' , 'about' => 'failed'], 200);


}


// product one view

public function product_one($id){
    $datas = product::where('id', $id)->first();
    $data = [
        'Product' => $datas
    ];
      return response()->json($data, 200);
}

// update product

public function update_pro(Request $req){

 product::where('id' , $req->$id)->update([
            'name' => $req->name ,
            'price' => $req->price
        ]);


    $data = product::where('id', $req->id)->first();

    if(isset($data)){


        $for = [
            'status' => 'true'
        ];
        return response()->json($for, 200);

    }
 }


 // update category

 public function update_cat(Request $req){
    $data = category::where('category_id' , $req->id)->first();

    if(isset($data)){
        category::where('category_id' , $req->id)->update([
            'name' => $req->name ,
        ]);


        $datas = [
            'update' => category::where('category_id' , $req->id)->first()
        ];
        return response()->json(['status' => 'true' , 'about' => 'success' , $datas], 200);

    }


 }
}



