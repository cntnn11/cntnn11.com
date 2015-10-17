<?php
return [
	'domain_pre_www'			=> env('DOMAIN_PRE_WWW', 'www'),
	'domain_pre_admin'			=> env('DOMAIN_PRE_ADMIN', 'www'),
	'domain_admin'				=> env('DOMAIN_ADMIN', '/admin'),

	'cdn'						=> env('CDN_URL'),
	'cdn_admin'					=> env('CDN_URL_ADMIN'),

	// 测试，后门
	'allow_test_method'			=> env('ALLOW_TEST_METHOD', false),
	'test_username'				=> env('TEST_USERNAME'),
	'test_password'				=> env('TEST_PASSWORD'),

	// 其他一些公共设置


];
