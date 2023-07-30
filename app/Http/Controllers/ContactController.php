<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ContactController;

class ContactController extends Controller
{
    //

    public function process_con(Request $data ){
        $req = [
            'name' => 'required' ,
            'email' => 'required' ,
            'script' => 'required' ,
        ];
        Validator::make($data->all() ,$req )->validate();

        $final = $this->createction($data);
        contact::create($final);

        return redirect()->route('userui');

     }

     private function createction($data){

        return [
            'name' => $data->name ,
            'email' => $data->email ,
            'message' => $data->script
        ];
     }

     public function uicon(){
        $contacts = contact::get();

         return view('admin.contact.contact_admin' , compact('contacts'));
         }


         public function asdfgh($id){
            contact::where('id' , $id)->delete();

            return redirect()->route('go_to_admin_contact_ui');
         }
}
