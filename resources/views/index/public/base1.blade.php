<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>商城</title>
		
		<link href="/user/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="/user/amazeui/css/amazeui.css" />
		<link href="/user/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="/user/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/user/css/addstyle.css" rel="stylesheet" type="text/css">
		<link href="/user/css/systyle.css" rel="stylesheet" type="text/css">
		<link href="/user/css/infstyle.css" rel="stylesheet" type="text/css">
		<link href="/user/css/stepstyle.css" rel="stylesheet" type="text/css">
		<link type="text/css" href="/user/css/colstyle.css" rel="stylesheet" />
		<script src="/user/js/jquery.js"></script>
		<script src="/user/amazeui/js/amazeui.min.js"></script>
		<style>
			.pagination li {
				float: left !important ;
				display: block;
				padding: 0.5em 1em;
				text-decoration: none;
				line-height: 1.2;
				background-color: #fff;
				border: 1px solid #ddd;
				border-radius: 0;
				margin-bottom: 5px;
				margin-right: 5px;
			}
			</style>
		@yield('style')
	</head>

	<body>
		<!--头 -->
		@include('index.public.header')

		<b class="line"></b>

		<div class="listMain">
			@include('index.public.nav')
		
		</div>	
		
	   
		<div class="center"> 
		 @yield('main')
		</div>
		@include('index.public.tip')
 		@include('user.public.footer')
        @yield('js')

	</body>

</html>