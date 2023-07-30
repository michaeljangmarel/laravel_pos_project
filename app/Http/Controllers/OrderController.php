<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\orderlist;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;

class OrderController extends Controller
{
    //

    public function history(){
        $order = order::where('user_id' , Auth::user()->id)->orderBy('created_at' , 'desc')->paginate(4);
         return view('user.categoryuserpage.history' , compact('order'));
    }

    public function orr(){

        cart::where('user_id' , Auth::user()->id)->delete();

    }

    public function ors(Request $l){

        cart::where('product_id' , $l->id)->delete();
    }

    public function uior(){

        $lalaorder = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->orderBy('created_at' , 'desc')->get();
          return view('admin.orderpath.order' ,  compact('lalaorder'));
    }

    public function motifi(Request $getter){

             $nine = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->orderBy('created_at' , 'desc');

             if($getter->status == null){
                $nine = $nine->get();
             }else{
                $nine = $nine->where('status' , $getter->status)->get();
             }
        return  $nine ;
    }

    // status ch

    public function lalavel(Request $ab){

        order::where('id' , $ab->oneid)->update([
            'status' => $ab->valuess
        ]);

        $o =  [
            'mess' => 'true'
        ];


        return response()->json($o, 200);





     }

     // search

     public function lll(Request $oli){

         $data = $oli->py ;

         if($data == null){
            $lalaorder = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->orderBy('created_at' , 'desc')->get();

         }elseif($data == 0){
            $lalaorder = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->orderBy('created_at' , 'desc')->where('status' , 0)->get();

         }elseif($data == 1){
            $lalaorder = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->orderBy('created_at' , 'desc')->where('status' , 1)->get();

         }elseif($data == 2){
            $lalaorder = order::select('orders.*' , 'users.name as user_name')->join('users' , 'orders.user_id' , 'users.id')->where('status' ,2)->orderBy('created_at' , 'desc')->get();

         }

         return view('admin.orderpath.order' ,  compact('lalaorder'));





     }

     // search


     // order code ui
     public function uuu($code){
        $subtotal = 0 ;
        $realorder = orderlist::select('orderlists.*' , 'users.name as user_name' , 'products.name as pro_name' ,'products.image as img' , 'products.price as price')->join('users' , 'orderlists.user_id' , 'users.id')
        ->join('products' , 'orderlists.product_id' , 'products.id')
        ->where('order_code' , $code)->get();

         foreach($realorder as $full){
            $subtotal += $full->total;
        }

        $fin = $subtotal + 3000 ;

    // dd($realorder->toArray());

        return view('admin.orderpath.orderdetail' ,compact('realorder' , 'subtotal' , 'fin'));
       }
     // order code ui



     // delect one section
     public function onese($id){


        cart::where('id' , $id)->delete();

        return redirect()->route('fullcart');
     }
     //delect one section

     // go to user  list ui

     public function iii(){

        $uslist = User::where('role' , 'user')->get();

         return view('admin.userlist.userlist' , compact('uslist'));
     }

     // go to user list

     // ajax

     public function ivanto(Request $two){

        User::where('id' , $two->user_id)->update([
            'role' => $two->chst
        ]);

        $su = [
            'status' => 'true'
        ];
        return $su ;

     }
     // ajax


     public function count(Request $about){
         $detail = product::where('id' , $about->pro_id)->first();
         $increase = [
            'view_count' => $detail->view_count + 1
         ];
         product::where('id' , $about->pro_id)->update($increase);




      }

      // delete process

      public function avoid($id){

        User::where('id' , $id)->delete();


        return  redirect()->route('gotouserlistui');


      }

      // contact process

      public function contacts(){
         return view('user.contact.contact_ui');
      }
}
