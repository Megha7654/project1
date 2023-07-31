<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Student;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home',function(){
//     return "hello wolrd";
// });

// Route::get('/test',[TestController::class,'index']);


// Route::get('/user',function(Request $request){
//     print_r($request->all());
// });

// Route::get('there',function(){
//     echo "there";
// });

// Route::redirect('/here','there');

// Route::view('viewpage','home',['user'=>"Megha"]);

// Route::get('student/{name?}',function(string $name="malay"){
//     echo "student name=".$name;
// })->where('name','[A-Za-z]+');

// Route::get('students',Student::class);
// Route::get("admin",function(){
//     $admin = ['name'=>"john",'role'=>'superadmin'];
//     $subject = ["php","java","python"];
//     return view('Admin.index',["admin"=>$admin,"subject"=>$subject,"flag"=>0]);
// });

Route::get('adminhome',function(){
    return view('Admin.dashbord');
});
Route::resource('product',ProductController::class);

Route::get('/token',function(Request $request){
    print_r($request->all());
    //echo $token = $request->session()->token();
   // echo $token= csrf_token();
});

Route::resource('/post',PostController::class);

