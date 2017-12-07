<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});

//默认访问页
Route::get('/',function(){
     return view('login');
});

Route::get('list',function(){ return "hellow world";  });

Route::get('test',function(){ return view('test');   }); //调试layout模板

/**
 * 登录/注册 群组
 */
Route::group(['prefix'=>'login'],function(){
       Route::get('/',['as'=>'LoginTo','uses'=>'login\LoginController@LoginTo']);            //登录控制器
       Route::get('register',['as'=>'Register','uses'=>'login\RegisterController@add']);     //注册控制器

});

Route::get('test1','StudentController@test1');



