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

Route::get('test1','StudentController@test1');

Route::get('login',['as'=>'login','uses'=>'login\LoginController@LoginTo']);





