<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
 use App\Models\product;
use App\Models\cart;
use App\Models\order;
use App\Models\orderlist;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

class CartController extends Controller
{
    //
  public function ajax(Request $jj){

    $noti  = $this->getee($jj);
    cart::create($noti);

    $lal = [
        'mess' => 'true'
    ];

    return response()->json($lal, 200);


  }


  public function cartss(){
    $autos = cart::select('carts.*' ,  'products.name as  name' , 'products.price as price' , 'products.image as image')->Leftjoin('products' , 'carts.product_id' , 'products.id')->where('user_id' , Auth::user()->id)->get();
     $normal = 0 ;
    foreach($autos as $no){
        $normal += $no->price*$no->amount ;
    }


     return view('user.cart.ordercart' , compact('autos' , 'normal'));
  }

  //
  public function dele($id){

    cart::where('id' , $id)->delete();
    return redirect()->route('fullcart');

  }


  //

  public function order(Request $ordernow){
    $total = 0 ;
    foreach($ordernow->all() as $one){
         $lala  = orderlist::create([
            'user_id' => $one['user_id'],
            'product_id' => $one['product_id'],
            'total' =>$one['total'],
            'qty' => $one['qty'] ,
            'order_code' => $one['order_code']

        ]);

        $total += $lala->total ;


    }

    cart::where('user_id', Auth::user()->id)->delete();

    order::create(['user_id' => Auth::user()->id ,
    'order_code' => $lala->order_code ,
    'final_amount' => $total+3000 ,

]);



    $da = [
        'status' => 'true'
    ];
     return response()->json($da, 200 );


   }
  // private

  private function getee($jj){
    return [
        'user_id' => $jj->usid ,
        'product_id' => $jj->proid,
        'amount' => $jj->pizid ,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()
    ];
  }

}
