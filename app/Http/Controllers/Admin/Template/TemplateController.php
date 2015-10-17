<?php
/**
 *	@desc 模板列表页面
 *	@author cntnn11
 *	@date 2015-12-14
*/
namespace App\Http\Controllers\Admin\Template;
use App\Http\Controllers\Controller;
use Config;


class TemplateController extends Controller
{

	public function listpage()
	{


		return view('admin.template.list');
	}

	public function getFormpage()
	{
		return view('admin.template.form');
	}

}
