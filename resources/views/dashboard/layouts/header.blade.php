<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="SIM DIKLIT RSGJ CIREBON" />
	<meta property="og:title" content="SIM DIKLIT RSGJ CIREBON" />
	<meta property="og:description" content="SIM DIKLIT RSGJ CIREBON" />
	<meta property="og:image" content="{{ asset('image/assets/logo.png') }}" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
	<!-- PAGE TITLE HERE -->
	<title>@yield('title') | SIM DIKLIT</title>
	
	@include('dashboard.layouts.components.css')
	
</head>
<body>

	<!--*******************
		Preloader start
	********************-->
	<div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
	</div>
	<!--*******************
		Preloader end
	********************-->

	<!--**********************************
		Main wrapper start
	***********************************-->
	<div id="main-wrapper">

		@include('dashboard.layouts.components.navbar')

		@include('dashboard.layouts.components.sidebar')