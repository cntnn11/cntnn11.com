<?php

namespace App\Http\Controllers\Www;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		
		$cdn = CDNVENDOR('boot335/css/bootstrap.min.css');
		return view('www.index.index');
	}
}
