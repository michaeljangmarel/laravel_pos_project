<?php

use App\Http\Controllers\ajax;
use App\Http\Controllers\auth;
use App\Http\Controllers\dash;
use App\Http\Controllers\userpage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


 // log in  လုပ်ပြီး မှ
Route::middleware(['auth'])->group(function () { Route::get('/dashboard', function () {return view('home');})->name('dashboard');

    // go to category ui admin
    ROUTE::get('categorys' , [CategoryController::class , 'categoryui'])->name('categoryadmin')->middleware('adminmiddleware'); // oင် လို့ ရ တဲ့ route
    //go to category ui admin


    // go to user category page
    ROUTE::get('userCategory' , [CategoryController::class , 'usercategoryui'])->name('userui')->middleware('usermiddleware');
    // go to user category page

    //

    ROUTE::middleware('adminmiddleware')->group(function (){

// go to create category page
ROUTE::get('create' , [CategoryController::class , 'create'])->name('createCategory');
// go to  create category page


// create item and database
ROUTE::post('createItem' , [CategoryController::class , 'createitem'])->name('createItem');
// create item and database


// category delect
ROUTE::get('delectfor/{id}' , [CategoryController::class , 'delectforch'])->name('delect');
// category delect


// go to edit page and process
ROUTE::get('editfor/{id}',[CategoryController::class , 'editforch'])->name('edit');
// go to edit page and prcess


// update
ROUTE::post('updatefor',[CategoryController::class,'updateforch'])->name('updated');
// update


// go to password  ui
ROUTE::get('chpass' , [CategoryController::class , 'changefor'])->name('changepass');
// go to password ui


//process of change password
ROUTE::post('changePassword' , [dash::class , 'newpassword'])->name('newpassword');
// process of change password


// go to account ui

ROUTE::get('accountfor' , [dash::class , 'account'])->name('accountPage');
// go to account ui



// go to edit name ui
ROUTE::get('updatenamefor' , [dash::class , 'editnameforch'])->name('editname');
// go to edit name ui


// update profile process

ROUTE::post('updateprofilefor' , [dash::class , 'updateprofilefor'])->name('updateprofile');
// update profile process

// product
ROUTE::get('Products' , [ProductController::class , 'product'])->name('productname');
// product


ROUTE::get('Createpizza' , [ProductController::class , 'crepiz'])->name('CreatePizza');



// pizza create process
ROUTE::post('Createpizza' , [ProductController::class , 'createnewpizza'])->name('notify');
// pizza create process


// pizza delete proceess
ROUTE::get('pizde/{id}' , [ProductController::class, 'pizzadelete'])->name('pizzadelete');
// pizza delete process


// details ui
ROUTE::get('pizinfo/{id}' , [ProductController::class , 'pizdetail'])->name('pizzainfo0');
// detail ui


// update pizza ui
ROUTE::get('PizzaUpdate/{id}' , [ProductController::class , 'pizupui'])->name('pizzaupui');
// update pizza ui



// update process
ROUTE::post('uppiz' , [ProductController::class , 'realup'])->name('upreal');
// update process s

 //  admin list ui
 ROUTE::get('Admin_ui' , [dash::class , 'adminlist'])->name('adminui_to');
 //  admin list ui



 // delete admin process
 ROUTE::get('delete_admin/{id}' , [dash::class , 'deleteadmin'])->name('adminlist');
 // delete admin process

 // change role ui
 ROUTE::get('Change_role/{id}' , [dash::class , 'chrole'])->name('changerole');
 // change role ui

// change role process
ROUTE::post('rolech' , [dash::class , 'lanbar'])->name('rolechpro');
// change role process


//    admin order ui
ROUTE::get('Order_ui_lists' , [OrderController::class , 'uior'])->name('orderuilistss');

// admin order change status with ajax
ROUTE::get('do' , [OrderController::class , 'motifi'])->name('hahass');


// status process with ajax
ROUTE::get('nana' , [OrderController::class , 'lalavel'])->name('orichan');


// status search
ROUTE::get('lanbarss' , [OrderController::class , 'lll'])->name('jjj');
// status search

// go to order code ui
ROUTE::get('Order_code_detail/{code}', [OrderController::class , 'uuu'])->name('ordercode');
// go to order code uu


//  go to user list ui
ROUTE::get('User_lists_' , [OrderController::class , 'iii'])->name('gotouserlistui');
// go to user list ui


// ajax  role ch
ROUTE::get('ustoad' , [OrderController::class , 'ivanto'])->name('ivasss');
// ajax role ch

// delect user process

ROUTE::get('Delect_user/{id}' , [OrderController::class , 'avoid'])->name('is');


// go to contact

ROUTE::get('Contact_list' , [ContactController::class  , 'uicon'])->name('go_to_admin_contact_ui');


ROUTE::get('onesec/{id}' , [ContactController::class , 'asdfgh'])->name('lala');

    });

    ROUTE::middleware('usermiddleware')->group(function (){
 // go to user info detail
ROUTE::get('User_info' , [userpage::class , 'usd'])->name('userde');
// go to user info detail

 // go to password ui
ROUTE::get('Password_change' , [userpage::class , 'usc'])->name('uschh');
 // go to password ui


 // change password
 ROUTE::post('chchpass' , [userpage::class , 'chpro'])->name('chprocess');
 // change password

 // go to  user  update ui
 ROUTE::get('edit_User' , [userpage::class , 'uppross'])->name('editui');
 // go to user update ui

  // update process
  ROUTE::post('sss' , [userpage::class , 'updatenaw'])->name('upset');
  // update process

  // filter
  ROUTE::get('Filter_category/{id}' , [userpage::class , 'nums'])->name('haha');
  // filter

  // pizza detail ui
  ROUTE::get('Pizza_detail/{id}' , [userpage::class , 'pizzadetail'])->name('pizza_fullspace');
  // pizza detail ui

// ajax for add to cart
ROUTE::get('ajaxx' , [CartController::class , 'ajax'])->name('ajax_pro');

// ui cart
ROUTE::get('Cart_fullspace' , [CartController::class , 'cartss'])->name('fullcart');
// ui cart

// delete process
ROUTE::get('Cart_trash/{id}' , [CartController::class , 'dele'])->name('deoo');
// delete process

// Ajax with order

ROUTE::get('ccc', [CartController::class , 'order'])->name('orderajax');

// show order list ui
ROUTE::get('Order_list_history' , [OrderController::class , 'history'])->name('historyss');


// delect all cart
ROUTE::get('lala' , [OrderController::class , 'orr'])->name('orrs');

//  delect one section
ROUTE::get('lalas' , [OrderController::class , 'ors'])->name('oth');


// delect one section with sever
ROUTE::get('delect_one/{id}' , [OrderController::class , 'onese'])->name('mm');


// ajax with view count
ROUTE::get('view' , [OrderController::class , 'count'])->name('cc');
});

  //  testing
  ROUTE::get('ffx' , [ajax::class , 'fsd'])->name('use_ajax');
  // testing


  // contact ui
  ROUTE::get('Contact_ui' , [OrderController::class , 'contacts'])->name('go_to_contact');


  // contact process

  ROUTE::post('Contact_pro' , [ContactController::class , 'process_con'])->name('go_to_process');


    });

// register before login ui

// go to ui register
ROUTE::get('/' , [auth::class , 'none'])->name('began')->middleware('adminmiddleware');
ROUTE::get('registers' , [ auth::class , 'register'])->name('registerPage')->middleware('adminmiddleware');
// go to ui register


// go to ui login
ROUTE::get('logins' , [auth::class, 'login'])->name('loginPage')->middleware('adminmiddleware');
// go to ui login


// go to dashboard   <??? this is function is make if the user after authenicate from log in form  decide user role or admin rolo
ROUTE::get('decide' , [dash::class , 'decide']);
// go to dashboard



Route::get('webtesting' , function () {
    $data = [
        'message' => 'This is success'
    ];

    return response()->json($data, 200);
});


