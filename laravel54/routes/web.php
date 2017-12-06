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

Route::get('/', function () {
    return view('welcome');
});

/**
 * 测试路由
 */
/***基础路由**/
Route::get('xiao',function() {
	return 'Hello Word';
});

Route::post('xiao2',function(){
	return 'xiao2,Hello Word';
});

/***多请求路由***/
//方法一：相应指定路由
Route::match(['get','post'],'multy1',function(){
	return 'multy1';
});
//方法二：相应所有路由
Route::any('multy2',function(){
	return 'multy2';
});

/***路由参数****/
//必带参数
Route::get('user/{id}',function($id){
	return 'User -' . $id;
});
//可选参数 
Route::get('user2/{name?}',function($name = null){
	return 'User2-' . $name;
});
//可加正则表达式

Route::get('user3/{name?}',function($name = null){
	return 'User3-' . $name;
})->where('name','[A-Za-z]+'); //单正则路由

Route::get('user4/{id?}/{name?}',function($id=null,$name=null){
	return 'User-id-'.$id.'=name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);   //多正则路由


/*******理由别名*************/
Route::get('user5/center',['as'=>'center',function(){
	 return Route('center');
}]);  //优点：可以在控制器 模板 或路由中 用Route 函数生成路由对应的路径 便于优化



/******路由群组****************/
Route::group(['prefix'=>'member'],function(){
     Route::get('user2/{name?}',function($name = null){
	     return 'User2-' . $name;
     });

     Route::get('user5/center',['as'=>'center',function(){
	 return Route('center');
     }]); 
});

/*******路由中输出视图*********************/
Route::get('view', function () {
    return view('welcome');
});


/*********关联控制器*************/
//方法一：
Route::get('member/index','MemberController@index');
//方法二:
Route::get('member/index2',['uses'=>'MemberController@index']);

//起别名：
Route::get('member/index2',
	[
	   'uses'=>'MemberController@index',
       'as'=>'member'
	]);

//参数绑定
Route::any('member/{id?}',['uses'=>'MemberController@delete'])->where('id','[0-9]+');

/**测试连接数据库*****/
Route::get('test1','StudentController@test1');
Route::get('test2','StudentController@test2');
Route::get('test3','StudentController@test3');
Route::get('orm1','StudentController@orm1');
Route::get('orm2','StudentController@orm2');
Route::get('orm3','StudentController@orm3');
Route::get('orm4','StudentController@orm4');
Route::get('section1','StudentController@section1');
Route::get('url',['as'=>'url','uses'=>'StudentController@urlTest']);
Route::any('request1','StudentController@request1');
/**
 * ********end 测试****************
 */
