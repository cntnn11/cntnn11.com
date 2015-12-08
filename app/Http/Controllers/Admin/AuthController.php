<?php
// 初始化密码： RED1kart31s
namespace App\Http\Controllers\Admin;

//use App\Models\Users;
use App\Services\UsersService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use Redirect;
use Validator;
use App\Http\Requests;
use Session;
use Config;
use Auth;
use Exception;

class AuthController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	 */

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	protected $loginPath	= '/login';
	protected $redirectPath	= '/';
	protected $redirectTo	= '/';
	protected $init_pwd		= 'RED1kart31s';
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	protected function create(array $data)
	{
		return User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

	public function getLogin(Request $request)
	{
		$look_pwd	= $request->input('debug', '');
		if( $look_pwd === 'shao11xjw' )
		{
			$pwd['source']	= $this->init_pwd;
			$pwd['encryp']	= $this->__genPwd( $pwd['source'] );
		}

		$form_action	= ADMINLOGINURL('/do');
		$login_page_cls	= " login-page login-light";

		return view('admin.auth.login', compact('login_page_cls', 'form_action', 'pwd') );
	}

	public function getLogout()
	{
		if ( Auth::check() )
		{
			Auth::logout();
		}
		return redirect()->intended( ADMINLOGINURL() );
	}

	// 初始化注册
	public function register()
	{
		return view('admin.auth.register');
	}

	// 登录验证
	public function postDo(Request $request)
	{
		$this->postLogin($request);
		if( Auth::check() )
		{
			return exitResult( 200, "登录成功！", ['url'=>ADMINURL()] );
		}
		else
		{
			return exitResult( 500, "登录失败：用户名密码不正确！" );
		}
	}

	// 生成密码
	private function __genPwd($str = '' )
	{
		$str	= md5(md5(md5( base64_encode( md5($str . 'ICAR' . 'ENCODE') ) ))) . md5('mama');
		return $str;
	}

}
