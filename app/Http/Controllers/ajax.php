<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ajax extends Controller
{
    //
    public function fsd(Request $ok){
        if($ok->status == 'asc'){
            $data = product::orderBy('created_at' , 'asc')->get();
        }else{
            $data = product::orderBy('created_at' , 'desc')->get();
        }
        return $data ;
    }


}
