<?php

namespace App\Http\Controllers;
use Storage ;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{

    public function crepiz(){
        $gogo = category::get();
        return view('admin.pizza product.createpizza' , compact('gogo'));
     }

     public function product(){
       $pros = product::select('products.*' , 'categories.name as category_name')->join('categories' , 'products.category_id' , 'categories.category_id')->when(request('finds') , function ($aa) {
        $data = request('finds') ;
        $aa->orWhere('products.name' , 'like' ,'%'.$data.'%')->orWhere('products.price' , 'like' , '%'.$data.'%');
       })->orderBy('products.created_at' , 'desc')->paginate(5);
        return view('admin.pizza product.pizzaui' , compact('pros'));
     }



 public function createnewpizza (Request $spp){


    $req = [
        'crep' => 'required|unique:products,name|min:5' ,
        'opt' => 'required',
        'info' => 'required|min:10',
        'pri' => 'required' ,
        'waiting' => 'required' ,
        'pizimg' => 'required|mimes:png,jpg,jpeg|file'
    ];

    $mess = [
        'crep.required' => 'HOLD YOUR FAVOURITE' ,
        'opt.required' => 'HOLD SOME CATEGORY' ,
        'info.required' => 'HOLD SOME DESCRIPTION' ,
        'pri.required' => 'HOLD YOUR PRICE',
        'pizimg.required' => 'IMG NEEDED' ,
        'waiting.required' => 'Need to Fill'
    ];


    Validator::make($spp->all(),$req ,$mess)->validate();

    $notiphone = $this->jkj($spp);

    if($spp->hasFile('pizimg')){
        $orgs = uniqid().'piz'.$spp->file('pizimg')->getClientOriginalName();
        $spp->file('pizimg')->storeAs('public' , $orgs);
        $notiphone['image'] = $orgs ;
    }

    product::create($notiphone);
    return redirect()->route('productname')->with(['noti' => 'UPDATED SUCCSEEFUL PIZZA PAGE ']);

    }

    // delete process
    public function pizzadelete($id){

        product::where('id' , $id)->delete();
        return redirect()->route('productname');

    }
    // delete process

    // ui
    public function pizdetail($id){

        $str = product::select('products.*' , 'categories.name as category_name')->join('categories' , 'products.category_id' , 'categories.category_id')->where('id' , $id)->first();
        return view('admin.pizza product.pizzainfo' , compact('str'));
    }
    // ui


    // go to update ui
    public function pizupui($id){
        $lala = product::where('id' , $id)->first();
         $lalas = category::get();
        return view('admin.pizza product.updatepizza' , compact('lala' , 'lalas'));
    }
    // go to update ui


    // update process
    public function realup(Request $other){
        $need = [
            'upname' => 'required|unique:products,name,'.$other->idss ,
           'updesc' => 'required|min:10' ,
           'photo' => 'mimes:jpg,jpeg,png|file',
           'cate' => 'required' ,
           'upprice' => 'required',
           'uptime' => 'required' ,
       ];

       $vibr = [
        'upname.required' => 'THE NAME FIELD IS REQUIRED ' ,
        'updesc.required' => 'THE DESCRIPTION FIELD IS REQUIRED ' ,
    ];

    Validator::make($other->all() , $need , $vibr)->validate();
    $idnumber = $other->idss;
    $updates = $this->noti($other);

    if($other->hasFile('photo')){

        $oldphs = product::where('id' , $idnumber)->first();
        $oldphs = $oldphs->image ;

        if($oldphs != null){
             Storage::delete('public/'.$oldphs);
        }

         $orgname = uniqid().'piz_img'.$other->file('photo')->getClientOriginalName();
         $other->file('photo')->storeAs('public' , $orgname);
         $updates['image'] = $orgname ;
    }

     product::where('id' , $idnumber)->update($updates);
     return redirect()->route('productname');

    }
    // update process

 // private
 private function jkj($spp){

    return [
        'name' => $spp->crep ,
        'category_id' => $spp->opt ,
        'description' =>  $spp->info ,
        'price' => $spp->pri ,
        'waiting_time' => $spp->waiting
        // 'image' => $spp->pizimg
    ];
 }
 // private

 private function noti($other) {
    return [
        'name' => $other->upname ,
        'price' => $other->upprice,
        'description' =>  $other->updesc,
        'category_id' => $other->cate,
        'waiting_time'  => $other->uptime,

    ];
  }
// private

}

//



// flutter  dart /  node js  express  mongo  /   php laravel sql / react tailwind css bootstrap //


