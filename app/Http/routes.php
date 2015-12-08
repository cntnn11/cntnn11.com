<?php
//测试
/*Route::controllers([
	'test' => 'TestController',
]);*/


// 站点单页
Route::any('404', 'ErrorPageController@notfound');
Route::any('403', 'ErrorPageController@notRole');
Route::any('500', 'ErrorPageController@webError');

// www页面
Route::group(['namespace'=>'Www'], function(){
	// 首页
	Route::get('/index', 'IndexController@index');

	Route::get('/blog', 'BlogController@index');

	Route::any('', 'IndexController@index');
});


// 管理后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin' ], function () {

	Route::get('login', 'AuthController@getLogin');
	Route::post('login/do', 'AuthController@postDo');
	Route::get('logout', 'AuthController@getLogout');
	Route::get('init/register', 'AuthController@register');

	//后台
	Route::group(['middleware'=>'auth'], function(){

		Route::group(['prefix' => 'template', 'namespace' => 'Template'], function () {
			Route::get('listpage', 'TemplateController@listpage');
			Route::get('formpage', 'TemplateController@formpage');
		});

		//Route::controller('/index', 'MainController');
		Route::get('/', 'MainController@welcome');
	});


});
