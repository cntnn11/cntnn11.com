
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="/favicon.ico">

	<title>Tan's website</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ CDNVENDOR('boot335/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
		<script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

	<!-- Custom styles for this template -->
	<link href="{{ CDN('css/cntnn11.css') }}" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body class="text-center">
<div class="container">

	@include('www.public._www_nav')


	@yield('container')


	<hr class="featurette-divider">
	<footer>
		<p>&copy; 2015 Company, Inc. &middot; 
	</footer>

</div>
<script src="{{ CDNVENDOR('boot335/js/bootstrap.min.js') }}"></script>
</body>
</html>
