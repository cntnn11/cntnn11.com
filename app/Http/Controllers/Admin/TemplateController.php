<?php
/**
 *	@desc 模板列表页面
 *	@author cntnn11
 *	@date 2015-12-14
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class TemplateController extends Controller
{

	public function getListpage(Request $request)
	{


		return view('admin.template.list');
	}

	public function getFormpage(Request $request)
	{
		return view('admin.template.form');
	}

}
