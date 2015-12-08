<?php
/**
 *	@desc 公共函数库文件
*/

function ADMINLOGINURL( $action = '' )
{
	return url('admin/login' . $action);
}
// 管理后台的url前缀
function ADMINURL( $path = '' )
{
	$url	= Config::get('app.url') . '/admin' . $path;
	return $url;
}
// 管理后台的css、js等路径
function ADMINCDN($file)
{
	$cdn	= rtrim(Config::get('common.cdn_admin', ''), '/');
	$path	= Config::get('app.url') . $cdn.'/'.$file;
	return $path;
}

// 前端插件目录
function CDN($file)
{
	$cdn	= rtrim(Config::get('common.cdn', ''), '/');
	$path	= Config::get('app.url') . $cdn . '/' . $file;
	return $path;
}
// 第三方静态插件的目录
function CDNVENDOR($file)
{
	$cdn	= rtrim(Config::get('common.cdn_vendor', ''), '/');
	$path	= Config::get('app.url') . $cdn . '/' . $file;
	return $path;
}

// 把一个数组，以JSON格式返回。一把用于Ajax和API
function exitResult($code = '', $msg = '', $data = [] )
{
	$result['code']	= $code;
	$result['msg']	= $msg;
	$result['data']	= $data;
	return response()->json($result);
	//exit( json_encode($result) ); 
}

// UC加密解密方案
function ucAuthcode($string, $operation = 'DECODE', $key = 'Driver&&Programmer', $expiry = 0)
{
	$ckey_length = 4;

	$key = md5($key);
	$keya = md5(substr($key, 0, 16));
	$keyb = md5(substr($key, 16, 16));
	$keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

	$cryptkey = $keya.md5($keya.$keyc);
	$key_length = strlen($cryptkey);

	$string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
	$string_length = strlen($string);

	$result = '';
	$box = range(0, 255);

	$rndkey = array();
	for ($i = 0; $i <= 255; ++$i) {
		$rndkey[$i] = ord($cryptkey[$i % $key_length]);
	}

	for ($j = $i = 0; $i < 256; ++$i) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for ($a = $j = $i = 0; $i < $string_length; ++$i) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if ($operation == 'DECODE') {
		if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
			return substr($result, 26);
		} else {
			return '';
		}
	} else {
		return $keyc.str_replace('=', '', base64_encode($result));
	}
}
