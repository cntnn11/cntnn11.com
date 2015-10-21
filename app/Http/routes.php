<?php
//测试
/*Route::controllers([
	'test' => 'TestController',
]);*/


// 站点单页
Route::any('login', function(){
	return view('pages._login', ['login_page_cls'=>'login-page login-light']);
});
Route::any('404', 'ErrorPageController@notfound');
Route::any('403', 'ErrorPageController@notRole');
Route::any('500', 'ErrorPageController@webError');


// www页面
Route::group(['namespace'=>'Www'], function(){
	
	// 首页
	Route::any('/', 'IndexController@index');
	Route::get('/index', 'IndexController@index');

	Route::get('/blog', 'BlogController@index');

});

// 管理后台
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', ], function () {

	Route::get('/login', 'AuthController@getLogin');
	Route::controller('auth', 'AuthController');

	Route::group(['middleware'=>['auth']], function(){

		Route::any('/index', function(){
			return view('admin.main.welcome');
		});

		Route::group(['prefix' => 'template', 'namespace' => 'Template'], function () {
			Route::get('listpage', 'TemplateController@listpage');
			Route::get('formpage', 'TemplateController@formpage');
		});

	});

		

	

});


/*Route::any('/', function(){
	return view('welcome');
});*/


