<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\CategoryController;



class CategoryController extends Controller
{
    //
   // category ui admin
      public function categoryui() {
        $categorydatatoui = category::when( request('find'), function($a){
             $data = request('find');
             $a->orWhere('name','like','%'.$data.'%');
        })->orderBy('category_id' , 'desc')->paginate(5);
        return view('admin.category.list' , compact('categorydatatoui'));
    }
     // category ui admin


    // category ui user
    public function usercategoryui(){
        $pizzapro = product::orderBy('created_at' , 'desc')->get();
        $catpro = category::get();
        $order = order::where('user_id' , Auth::user()->id)->get();
        $ccs = cart::where('user_id' , Auth::user()->id)->get();
         return view('user.categoryuserpage.usercategory' , compact('pizzapro' , 'catpro' , 'ccs' , 'order'));
    }
     // category ui use


     // go to create category

      public function create() {
        return view('admin.category.create');
      }
     //  go to create category



     // create item

     public function createitem(Request $create) {
        $this->createvalidation($create);

        $createItems = $this->createCategory($create);

        category::create($createItems);
        return redirect()->route('categoryadmin')->with(['categorysuccess' => 'CREATED SUCCSEEFUL']);

     }
     // create item

     // delect item

      public function delectforch($id){
        category::where('category_id',$id )->delete();
        return redirect()->route('categoryadmin')->with(['categorydelect'=> 'DELECT SUCCESS ']);

      }
     // delect item

     // edit page
     public function editforch($id){
        $pay = category::where('category_id' , $id)->first();
        return view('admin.category.edit' , compact('pay'));

     }
     // edit page

     // update
     public function updateforch(Request $nn){
        $updateneed = [
            'updateitem' => 'required|unique:categories,name',
        ];
        $updatemess = [
            'updateitem.required' => 'PLEASE HOLD YOUR UPDATE ONE',
            'updateitem.unique' => 'THE SAME ALREADY YOU JUST CHOOSEN' ,
        ];
         Validator::make($nn->all(),$updateneed, $updatemess)->validate();

         $updateid = $nn->updatess ;
         $arrayss = $this->doraymi($nn);

         category::where('category_id' ,$updateid)->update($arrayss);
         return redirect()->route('categoryadmin')->with(['updatesuccess' => 'UPDATED SUCCESSFUL ! ']);

     }
     // update


     // chang password

     public function changefor(){
        return view('admin.password.change');
     }
     // change password



     //private area

     private function  createvalidation($create){
        $need = [
            'createItem' => 'required|unique:categories,name' ,
        ];
        $messages = [
            'createItem.required' => 'PLEASE HOLD YOUR FAVOURIATE FOOD ! ',
            'createItem.unique' => 'Food ALREADY CHOOSEN' ,
        ];
        Validator::make($create->all(),$need , $messages)->validate();
     }

     private function createCategory($create){
        return [
            // 'category_id' =>$create->createItem ,
            'name' => $create->createItem
        ];
     }

     private function doraymi($nn){
        return [
            'name' => $nn->updateitem

        ];

     }

     // private area




}
