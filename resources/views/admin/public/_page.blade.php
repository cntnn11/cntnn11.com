<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

	<title>@if (trim($__env->yieldContent('title'))) @yield('title') - @endif{{ Config::get('app.name') }}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script type="text/javascript">window.CDN_BASE='{{ ADMINCDN('') }}';window.APP_URL='{{ url() }}/';</script>

	<link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/fonts/linecons/css/linecons.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/fonts/fontawesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/xenon-core.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/xenon-forms.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/xenon-components.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/xenon-skins.css') }}">
	<link rel="stylesheet" href="{{ ADMINCDN('assets/css/custom.css') }}">

	<script src="{{ ADMINCDN('assets/js/jquery-1.11.1.min.js') }}"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	@yield('header_css')
	@yield('header_js')
	<!-- <link rel="shortcut icon" type="text/css" href="/"> -->
	
</head>
<body class="page-body {{ $login_page_cls or ''  }} ">
	@yield('body')
	<!-- Bottom Scripts -->
	<script src="{{ ADMINCDN('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ ADMINCDN('assets/js/TweenMax.min.js') }}"></script>
	<script src="{{ ADMINCDN('assets/js/resizeable.js') }}"></script>
	<script src="{{ ADMINCDN('assets/js/joinable.js') }}"></script>
	<script src="{{ ADMINCDN('assets/js/xenon-api.js') }}"></script>
	<script src="{{ ADMINCDN('assets/js/xenon-toggles.js') }}"></script>
	<!-- JavaScripts initializations and stuff -->
	<script src="{{ ADMINCDN('assets/js/xenon-custom.js') }}"></script>

	@yield('footer_js')
</body>
</html>
