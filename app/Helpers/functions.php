<?php
/**
 *	@desc 公共函数库文件
*/
function ADMINCDN($file)
{
	$cdn	= rtrim(Config::get('common.cdn_admin', ''), '/');
	$path	= Config::get('app.url') . $cdn.'/'.$file;
error_log($path."\n",3 , '/tmp/cntnn11.lc.log');
	return $path;
}
