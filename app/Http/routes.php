<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/','Home\IndexController@index'); //首页
	Route::get('fruit','Home\IndexController@fruit'); //科技成果
	Route::get('need','Home\IndexController@need'); //科技需求
	Route::get('assess','Home\IndexController@assess'); //科技评估
	Route::get('hatch','Home\IndexController@hatch'); //科技孵化
	Route::get('bank','Home\IndexController@bank'); //科技金融
	Route::get('link','Home\IndexController@link'); //科技导航
	Route::get('laboratory','Home\IndexController@laboratory'); //共建实验室
	Route::get('expert','Home\IndexController@expert'); //科技专家库
	Route::get('videos','Home\IndexController@videos'); //科技大讲堂

	Route::get('fruit/{id}','Home\ArticleController@fruit'); //科技成果
	Route::get('need/{id}','Home\ArticleController@need'); //科技需求
	Route::get('assess/{id}','Home\ArticleController@assess'); //科技评估
	Route::get('hatch/{id}','Home\ArticleController@hatch'); //科技孵化
	Route::get('bank/{id}','Home\ArticleController@bank'); //科技金融
	Route::get('link/{id}','Home\ArticleController@link'); //科技导航
	Route::get('laboratory/{id}','Home\ArticleController@laboratory'); //共建实验室
	Route::get('expert/{id}','Home\ArticleController@expert'); //科技专家库
	Route::get('videos/{id}','Home\ArticleController@videos'); //科技大讲堂

	Route::get('quit','Home\IndexController@quit'); //注销
	Route::get('search','Home\IndexController@index'); //搜索
	Route::post('search','Home\IndexController@search'); //搜索

	Route::any('admin/register','Admin\LoginController@register'); //注册
	Route::any('admin/login','Admin\LoginController@login'); //登录
	Route::get('admin/code','Admin\LoginController@code');
	Route::get('admin/crypt','Admin\LoginController@crypt'); 

});

Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {

	Route::get('index','IndexController@index');
	Route::get('info','IndexController@info');
	Route::get('quit','LoginController@quit');
	Route::any('pass','IndexController@pass');

	Route::resource('fruit','FruitController');  //科技成果
	Route::resource('need','NeedController');  //科技需求
	Route::resource('assess','AssessController');  //科技评估
	Route::resource('hatch','HatchController');  //科技孵化
	Route::resource('bank','BankController');  //科技金融
	Route::resource('link','LinkController');  //科技导航
	Route::resource('laboratory','LaboratoryController');  //共建实验室
	Route::resource('expert','ExpertController');  //科技专家库
	Route::resource('video','VideoController');  //科技大讲堂

	Route::any('upload','IndexController@upload');	

});

Route::group(['middleware'=>['web','admin.login','administrator'],'prefix'=>'admin','namespace'=>'Admin'],function(){

	Route::get('fruadmin','AdministratorController@fruadmin'); //科技成果
	Route::get('fruchangestate/{id}','AdministratorController@fruchangestate')->where('id','\d+');
	Route::get('neeadmin','AdministratorController@neeadmin'); //科技需求
	Route::get('neechangestate/{id}','AdministratorController@neechangestate')->where('id','\d+');
	Route::get('hatadmin','AdministratorController@hatadmin'); //科技孵化
	Route::get('hatchangestate/{id}','AdministratorController@hatchangestate')->where('id','\d+');
	Route::get('banadmin','AdministratorController@banadmin'); //科技金融
	Route::get('banchangestate/{id}','AdministratorController@banchangestate')->where('id','\d+');
	Route::get('assadmin','AdministratorController@assadmin'); //科技评估
	Route::get('asschangestate/{id}','AdministratorController@asschangestate')->where('id','\d+');

});
