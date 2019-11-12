<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get('/','home/index/index');

/*//后台首页路由
Route::get('/admin/index','admin/index/index')->middleware(app\http\middleware\CheckAuth::class);
//后台欢迎页面
Route::get('/admin/welcome','admin/index/welcome')->middleware(app\http\middleware\CheckAuth::class);*/


//需要经过的中间件
Route::group('/admin/',function(){
	Route::get('index','admin/index/index');
	Route::get('welcome','admin/index/welcome');

	Route::any('updpassword','admin/login/updpassword');

	//分类管理的路由
	Route::get('categoryindex','admin/category/index');
	Route::get('addCategory','admin/category/create');
	Route::post('savecategory','admin/category/save');
	Route::post('delcategory','admin/category/delete');
	Route::get('editcategory/id/:id','admin/category/edit');
	Route::post('updatecategory','admin/category/update');
	

	//文章管理的路由
	Route::get('articleindex','admin/article/index');
	Route::post('delarticle','admin/article/delete');
	Route::get('addarticle','admin/article/create');
	Route::post('savearticle','admin/article/save');
	Route::get('editarticle/id/:id','admin/article/edit');
	Route::post('updatearticle','admin/article/update');
	Route::get('getContent','admin/article/getContent');
})->middleware(app\http\middleware\CheckAuth::class);

//前台home路由分组
Route::group('/home/',function(){
	Route::get('detail/id/:id','home/index/detail');
	Route::get('cate/id/:id','home/index/cate');
});

/*//后台登录路由
Route::any('/admin/login','admin/Login/login');
//退出的路由
Route::any('/admin/logout','admin/Login/logout');
*/
//不需要经过的中间件
Route::group('/admin/',function(){
	Route::any('login','admin/login/login');
	Route::any('logout','admin/Login/logout');
});


/**
 * miss路由
 * 没有定义的路由全部使用该路由
 */
Route::miss('home/index/index');


//测试
Route::get('/test','admin/test/test');
Route::any('/test1','admin/test/test1');
Route::any('/test2','admin/test/test2');
Route::any('/test3','admin/test/test3');
Route::any('/dbr','admin/test/dbr');
Route::any('/dbd','admin/test/dbd');
Route::any('/dbu','admin/test/dbu');
Route::any('/dbc','admin/test/dbc');

Route::get('/model','admin/test/modelCurd');

return [

];
