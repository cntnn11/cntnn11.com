<?php

namespace App\Http\Controllers;

use Config;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ErrorPageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function notfound()
	{
		$assign	= [
			'error'	=> [
				'num'	=> 404,
				'msg'	=> '你跟丢了~',
				'tip'	=> '这是一个提示语句',
			]
		];

		return view('pages._error', $assign);
	}

	public function notRole()
	{
		$assign	= [
			'error'	=> [
				'num'	=> 403,
				'msg'	=> '这里是禁区！不许查看。',
				'tip'	=> '这是一个提示语句',
			]
		];
		return view('pages._error', $assign);
	}

	public function webError()
	{
		$mail	= Config::get('common.web_boss.email');
		$assign	= [
			'error'	=> [
				'num'	=> 500,
				'msg'	=> '服务器内部错误！',
				'tip'	=> '我…… 程序…… I need help！请联系 ',
			],
			'mail'	=> $mail,
		];
		return view('pages._error', $assign);
	}

}
