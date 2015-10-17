<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;
use Config;
use Auth;

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

	protected $loginPath = '/login';
	protected $redirectPath = '/';
	/**
	 * Create a new authentication controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getLogin()
	{
		return view('auth.login');
	}
}
