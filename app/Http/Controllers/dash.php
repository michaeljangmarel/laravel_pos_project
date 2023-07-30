<?php

namespace App\Http\Controllers;

use Storage ;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\dash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class dash extends Controller
{
    //

    public function decide() {
         if(Auth::user()->role == 'admin'){
             return redirect()->route('categoryadmin');
         }else{
            return redirect()->route('userui') ;
         }
    }




     // password changes process

    public function newpassword(Request $ok){
        $req = [
            'oldpass' => 'required',
            'newpass' => 'required|min:5',
            'conpass' => 'required|min:5|same:newpass',
        ];
        $mess = [
            'oldpass.required' => 'FILL IN THE OLD PASSWORD' ,
            'newpass.required' => 'FILL IN THE NEWPASSWORD' ,
            'conpass.required' => 'FILL NEW CONFIRM PASSWORD IN THE FIELD' ,
            'newpass.min' => 'Should have length greater than 5 ' ,
            'conpass.min' => 'Should have length greater than 5 ',
            'conpass.same' => 'Must same with New Password',
        ];
        Validator::make($ok->all(),$req,$mess)->validate();

        $userss = User::select('password')->where('id',Auth::user()->id)->first();
        $userpassword = $userss->password;


        // dd($userpassword);

        if(Hash::check($ok->oldpass , $userpassword)){
            User::where('id' , Auth::user()->id)->update(['password' => Hash::make($ok->newpass)]);
        }

        return back()->with([
            'chs' => 'CHANGED PASSWORD'
        ]);



        // $newchange = $this->datatran($ok) ;
    }
     // password changes process


     // go to account ui
     public function account(){

        return view('admin.accountpage.acc');
     }
     // go to account ui


     // go to update naem ui

     public function editnameforch(){
         return view('admin.accountpage.editname');

        }
     // go to update naem ui



     // update process
     public function updateprofilefor(Request $newname) {

        $need = [
             'upname' => 'required|unique:users,name,'.$newname->cuid,
             'upemail' => 'required' ,
            'upaddress' => 'required' ,
            'upphone'=> 'required'  ,
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

            $dbsto = User::where('id' , $idcar)->first();
            $dbimg = $dbsto->img;

            if($dbimg != null){
                 Storage::delete('public/'.$dbimg) ;
            }

            $org =  uniqid().'user_profile'.$newname->file('photo')->getClientOriginalName() ;
            $newname->file('photo')->storeAs('public' , $org);
            $lala['img'] = $org ;

        }


        User::where('id' , $idcar)->update($lala);

        return redirect()->route('accountPage')->with(['su' => 'UPDATED PROFILE SUCCESS']);






     }
     // update process


     // admin  ui
    public function adminlist(){
        $admin = User::when(request('find') , function ($ev){
            $find = request('find');
            $ev->orWhere('name' , 'like' ,'%'.$find.'%')->orWhere('address' , 'like' ,'%'.$find.'%')->orWhere('email' , 'like' ,'%'.$find.'%');
        })->where('role' ,'admin')->paginate(3);
         return view('admin.admin_list.adminlist' , compact('admin'));
    }
     // admin  ui



     // admin  delete process

     public function deleteadmin($id){
        User::where('id' , $id)->delete();
        return redirect()->route('adminui_to');
    }
     // admin delete process


     // change role

     public function chrole($id){
        $success = User::where('id' , $id)->first();

        return view('admin.admin_list.changerole' , compact('success'));
     }
     // change role


     // change role process
     public function lanbar(Request $nga){
        Validator::make($nga->all() , ['role_ch'=> 'required'] , ['role_ch' => 'PLEASE CHANGE ROLE EVENT REQUIRED'])->validate();
         $getid = $nga->no ;
         User::where('id' , $getid)->update(['role' => $nga->role_ch]);
         return redirect()->route('categoryadmin');

     }
     // change role process


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
