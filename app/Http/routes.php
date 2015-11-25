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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware'=>'auth' ], function () {
	/*// 学习生涯设置
	Route::group(['prefix' => 'career', 'namespace' => 'Career'], function () {
	    Route::controller('path', 'PathController');
	    Route::controller('taskinfo', 'TaskInfoController');
	    Route::controller('hwinfo', 'HomeworkInfoController');
	    Route::controller('/', 'CareerController');
	});*/

	Route::controller('login', 'AuthController');
	//Route::get('/login', 'AuthController@getLogin');
	//Route::post('/dologin', 'AccountController@postDoLogin');

	Route::group(['prefix' => 'template', 'namespace' => 'Template'], function () {
		Route::get('listpage', 'TemplateController@listpage');
		Route::get('formpage', 'TemplateController@formpage');
	});

	//Route::controller('/index', 'MainController');
	Route::get('/', 'MainController@welcome');

});


/*Route::any('/', function(){
	return view('welcome');
});*/


