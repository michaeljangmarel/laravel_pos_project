<?php

namespace App\Http\Controllers;

use Storage ;
use App\Models\cart;
use App\Models\User;
use App\Models\order;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\userpage;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class userpage extends Controller
{
    //

    // user detail ui
    public function usd(){
        return view('user.categoryuserpage.userinfode');
    }
    // user detail ui


    // user password ui
    public function usc(){
        return view('user.passwordch.passch');
        }
    // user password ui

    // password process
    public function chpro(Request $process){
        $ssd  = ['oldpass' => 'required|min:5' ,
        'newpass' => 'required|min:5' ,
        'conpass' => 'required|min:5|same:newpass'];

        $mess  = [
            'oldpass.required' => 'OLD PASSWORD MUST HAVE FILL' ,
            'newpass.required' => 'NEW PASSWORD MUST HAVE FILL' ,
            'conpass.required' => 'CONFRIM PASSWORD MUST HAVE FILL' ,
            'conpass.same' => 'CONFRIM PASSWORD MUST HAVE SAME WITH NEW PASSWORD' ,



        ];
        Validator::make($process->all() , $ssd , $mess )->validate();

        $oldpassword = User::select('password')->where('id' , Auth::user()->id)->first();
        $oldss = $oldpassword->password;
        // dd($oldss);
        if(Hash::check($process->oldpass, $oldss)){
            User::where('id' , Auth::user()->id)->update(['password' => Hash::make($process->newpass)]);
            return redirect()->route('uschh')->with(['pasu' => 'CHANGED PASSWORD SUCCESSFUL']);
        }

    }
    // password process


     // go to ui user name change

     public function uppross(){
         return view('user.updateuserinfo.upinfo');
     }


     public function updatenaw(Request $newname){

        $need = [
            'upname' => 'required|unique:users,name,'.$newname->cuid,
            'upemail' => 'required' ,
           'upaddress' => 'required' ,
           'upphone'=> 'required|unique:users,phone'  ,
           'photo' => 'mimes:jpg,jpeg,png|file'
       ];

       $vibr = [
           'upname.required' => 'THE NAME FIELD IS REQUIRED ' ,
           'upemail.required' => 'THE EMAIL FIELD IS REQUIRED ' ,
           'upaddress.required' => 'THE ADDRESS FIELD IS REQUIRED ' ,
           'upphone.required' => 'THE  PHONE  FIELD IS REQUIRED ' ,
       ];

       Validator::make($newname->all() , $need , $vibr)->validate();
       $idcar = $newname->cuid ;
       $lala = $this->moti($newname) ;


       if($newname->hasFile('photo')){

        //    $dbsto = User::where('id' , $idcar)->first();
        //    $dbimg = $dbsto->img;

        //    if($dbimg != null){
        //         Storage::delete('public/'.$dbimg) ;
        //    }

           $org =  uniqid().'user_profile'.$newname->file('photo')->getClientOriginalName() ;
           $newname->file('photo')->storeAs('public' , $org);
           $lala['img'] = $org ;

       }


       User::where('id' , $idcar)->update($lala);
       return redirect()->route('userde');
     }

      public function nums($id){
        $pizzapro = product::where('category_id' , $id)->orderBy('created_at' , 'desc')->get();
        $catpro = category::get();
        $order = order::where('user_id' , Auth::user()->id)->get();
        $ccs = cart::where('user_id' , Auth::user()->id)->get();
         return view('user.categoryuserpage.usercategory' , compact('pizzapro' , 'catpro' , 'ccs' , 'order'));
       }

    // go to detail ui
    public function pizzadetail($id){
        $all = product::where('id' ,$id)->first();
        $alls = product::get();
        return view('user.pizzafullspace.pizzafull' , compact('all' , 'alls'));
    }
    // go to detail ui

     // private

     private function moti($newname) {

        return [
            'name' => $newname->upname ,
            'email' => $newname->upemail,
            'address' => $newname->upaddress ,
            'phone' => $newname->upphone,
            'gender' => $newname->upgender
        ];
     }
     // private

}
