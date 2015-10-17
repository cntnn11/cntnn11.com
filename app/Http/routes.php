<?php
//测试
/*Route::controllers([
	'test' => 'TestController',
]);*/


// 管理后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

	Route::group(['prefix' => 'template', 'namespace' => 'Template'], function () {
		Route::get('listpage', 'TemplateController@listpage');
		Route::get('formpage', 'TemplateController@formpage');
	});

});

//Route::group(['domain' => Config::get('common.domain_pre_www') . '.' . Config::get('app.domain') . Config::get('common.domain_admin'), 'namespace' => 'Admin'], function() {
	//登录
	//Route::get('login', 'AuthController@getLogin');
	//Route::controller('auth', 'AuthController');

	// 示例模板
	/*Route::group(['prefix'=>'template'],function(){
		Route::controller('listpage', 'TemplateController');
		Route::controller('formpage', 'TemplateController');
	});*/
	

	//后台
	/*Route::group(['middleware' => ['auth']], function () {
		Route::get('/', 'HomeController@index');
		Route::controller('file', 'FileController');
	});*/
//});

