<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard  $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('请先登录~.', 401);
			}
			else
			{
				return redirect()->guest( ADMINLOGINURL() );
			}
		}
		else
		{
			if (Auth::user()->status)
			{
				return view('errors.tips', ['message' => '您的账号尚未开通,请联系管理员', 'url_title' => '退出登录', 'url' => url('auth/logout')]);
			}
		}

		return $next($request);
	}
}
